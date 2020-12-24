<?php

namespace App\Http\Controllers;

use App\Http\Requests\Participant\CreateParticipantRequest;
use App\Facilitador;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FacilitadorController extends Controller
{
    function __construct(){
        $this->middleware('permission:facilitator-list')->only('index');
        $this->middleware('permission:facilitator-create',['only'=>['create','store']]);
        $this->middleware('permission:facilitator-edit',['only'=>['edit','update']]);
        $this->middleware('permission:facilitator-delete',['only'=>['destroy']]);
    }

    public function index()
    {
        
        
        $company_ids = Auth::user()->company->get()->modelKeys();

        $facilitators = User::whereHas('company', function($query) use($company_ids) {
            $query->whereIn('company_id', $company_ids);
        })
        ->with('company')
        ->role(['facilitador'])->get();
        

        return view('facilitators.index', compact('facilitators'));
    }

    public function create()
    {
        $user =  new User();
        return view('facilitators.create', compact('user'));
    }

    public function store(CreateParticipantRequest $request)
    {
        $company_ids = Auth::user()->companies->modelKeys();
        $fields = $request->validated();
        $fields['password'] = Hash::make($fields['password']);

        $facilitator = User::create($fields);
        $facilitator->companies()->attach($company_ids);
        $facilitator->assignRole(['facilitador']);
        $facilitator->revokePermissionTo('course-mine');
        if ($request->hasFile('avatar')) {
            $facilitator->addMediaFromRequest('avatar')->toMediaCollection('users');
        }

        $message = "El Facilitador {$facilitator->getFullName()} fue registrado correctamente.";
        return redirect()->route('facilitators.index')->with('message', ['success', $message]);
    }

    public function show($id)
    {
        //
    }
    public function edit()
    {

       
    }
    public function modify(User $user)
    {

        return view('facilitators.edit',compact('user'));
        
    }

    public function actualize(CreateParticipantRequest $request, User $user)
    {
        
        $fields = $request->validated();

        $fields['password'] = Hash::make($fields['password']);
        $user->update($fields);
        if ($request->hasFile('avatar')){
            $user->clearMediaCollection('users');
            $user->addMediaFromRequest('avatar')->toMediaCollection('users');
        }
        
        $message = "El Facilitador {$user->getFullName()} fue actualizado correctamente.";
        return redirect()->route('facilitators.index')->with('message', ['success', $message]);
    }
    public function update()
    {
      
    }

    public function destroy($id)
    {
        //  
    }
}
