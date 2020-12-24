<?php

namespace App\Http\Controllers;

use App\User;

use App\Inscription;
use App\Participant;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Imports\ParticipantImport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Participant\CreateParticipantRequest;
use Carbon\Carbon;

class ParticipantController extends Controller
{
    function __construct(){
        $this->middleware('auth');
        $this->middleware('permission:participant-list')->only('index');
        $this->middleware('permission:participant-create',['only'=>['create','store']]);
        $this->middleware('permission:participant-edit',['only'=>['edit','update']]);
        $this->middleware('permission:participant-delete',['only'=>['destroy']]);
    }

    public function index()
    {
        $user = Auth::user();

        $participants = User::query()
            ->with(['company', 'media'])
            ->role(['participante'])
            ->when($user->hasRole('contratista'), function ($query) {
                return $query->thisCompany();
            })
            ->orderBy('users.last_name')
            ->get();
        $participants_count = count($participants);
        return view('participants.index', compact('participants', 'participants_count'));
    }
    public function import(Request $request)
    {
        ini_set('max_execution_time', 720000);
        ini_set('memory_limit', -1);

        $file = $request->file('file_up');

        Excel::import(new ParticipantImport, $file);
        return back()->with('success', 'Se actualizaron las datos del participante');
    }
    public function create()
    {
        $user =  new User();
        return view('participants.create', compact('user'));
    }

    public function store(CreateParticipantRequest $request)
    {
        $company_id = Auth::user()->company_id;
        $fields = $request->validated();
        $fields['password'] = Hash::make($fields['password']);
        $fields['company_id'] = $company_id;

        $participant = User::create($fields);

        $participant->assignRole(['participante']);

        if ($request->hasFile('avatar')) {
            $participant->addMediaFromRequest('avatar')->toMediaCollection('users');
        }

        $message = "El participante {$participant->getFullName()} fue registrado correctamente.";
        return redirect()->route('participants.index')->with('message', ['success', $message]);
    }

    public function show(User $user)
    {

    }

    public function profile(User $user)
    {

        $user->load('inscriptions.classroom');
        foreach($user->inscriptions as $inscription){
            if($inscription->classroom->type_validity ==1){
                $date="year";
            }elseif($inscription->classroom->type_validity ==2){
                $date="month";
            }else{
                $date="day";
            }
        }
        $start_datetime=Carbon::parse($inscription->classroom->start_datetime)->format('d-m-Y H:i:s');

        $validation = strtotime(" {$start_datetime}. + {$inscription->classroom->validity} {$date}");
        $validation=Carbon::parse($validation)->format('d-m-Y H:i:s');


        return view('participants.profile', compact('user','validation'));

    }

    public function edit()
    {

    }
    public function modify(User $user)
    {
        return view('participants.edit',compact('user'));
    }
    public function actualize(CreateParticipantRequest $request,User $user)
    {
        $fields = $request->validated();

        if (!empty($fields['password'])){

            $fields['password'] = Hash::make($fields['password']);

        } else {
            $fields = Arr::except($fields, ['password']);
        }
        $user->update($fields);

        if ($request->hasFile('avatar')){

            $user->clearMediaCollection('users');
            $user->addMediaFromRequest('avatar')->toMediaCollection('users');
        }

        $message = "El participante {$user->getFullName()} fue actualizado correctamente.";
        return redirect()->route('participants.index')->with('message', ['success', $message]);
    }


    public function update()
    {

    }

    public function destroy($id)
    {
        //
    }
}
