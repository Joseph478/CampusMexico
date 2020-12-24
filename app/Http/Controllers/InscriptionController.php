<?php

namespace App\Http\Controllers;
use App\User;
use App\Course;
use App\Company;
use App\Classroom;
use Carbon\Carbon;
use App\Inscription;
use PhpParser\Builder;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\InscriptionImport;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Inscription\RegisterInscriptionRequest;

class InscriptionController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:inscription-list');
         $this->middleware('permission:inscription-create', ['only' => ['create','store']]);
         $this->middleware('permission:inscription-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:inscription-delete', ['only' => ['destroy']]);
    }


    public function index()
    {
        $classrooms = Classroom::query()
            ->with(['course'])
            ->withCount(['scheduledParticipants' => function ($query) {
                $query->thisCompany();
            }])
            ->whereHas('scheduledParticipants', function ($query) {
                $query->thisCompany();
            })
            ->latest()
            ->get();

        $classrooms_count = count($classrooms);

        return view('inscriptions.index', compact('classrooms', 'classrooms_count'));
    }



    public function register(Classroom $classroom)
    {
        $user = Auth::user();

        $participants_inscription = $classroom
            ->scheduledParticipants()
            ->thisCompany()
            ->pluck('users.id');

        $participants = User::query()
            ->with('company')
            ->role(['participante'])
            ->when($user->hasRole('contratista'), function ($query) use ($participants_inscription) {
                return $query
                    ->thisCompany()
                    ->whereNotIn('id', $participants_inscription);
            })
            ->get();

        $participants_inscription_count = count($participants_inscription);

        return view('inscriptions.register',
            compact('participants','classroom', 'participants_inscription_count'));
    }

    public function import(Request $request)
    {

        ini_set('max_execution_time', 720000);
        ini_set('memory_limit', -1);
        $file = $request->file('file_up');
        Excel::import(new InscriptionImport, $file);
        return back()->with('success', 'Se agregaron las datos de la Inscription');
    }

    public function save(RegisterInscriptionRequest $request,Classroom $classroom)
    {
        $user= Auth::user();
        $fields = $request->validated();

        foreach( $fields['participants'] as $user_id ) {
            Inscription::create([
                'classroom_id' => $classroom->id,
                'user_id' => $user_id,
                'grade_min' => $classroom->grade_min,
                'type' => $classroom->type,
                'user_created' => $user->id,
            ]);
        }

        $classroom->decrement('vacancies', count($fields['participants'] ));

        $message = 'Se registro a sus participantes correctamente';

        return redirect()
            ->route('inscriptions.detail', $classroom->id)
            ->with('Mensaje', $message);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Inscription $inscription)
    {
        $inscription->delete();
        return back();
    }

    public function detail(Classroom $classroom) {
        $classroom->loadCount(['scheduledParticipants' => function($query) {
            $query->thisCompany();
        }]);
        $participants = $classroom->participants()->thisCompany()->get();

        return view('inscriptions.detail', compact('classroom', 'participants'));
    }
}
