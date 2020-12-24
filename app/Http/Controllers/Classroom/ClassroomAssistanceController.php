<?php

namespace App\Http\Controllers\Classroom;

use App\Assistance;
use App\Classroom;
use App\Http\Controllers\Controller;
use App\Http\Requests\Assistance\ClassroomAssistanceRequest;
use App\Http\Requests\Assistance\CreateAssistanceRequest;
use App\Http\Requests\Assistance\UpdateAssistanceRequest;
use App\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassroomAssistanceController extends Controller
{
    function __construct() {
        $this->middleware('auth');
    }

    public function index(Classroom $classroom)
    {

        $classroom->load(['assistances']);
        return view('assistances.index', compact('classroom'));
    }

    public function create(Classroom $classroom)
    {
        $assistance = new Assistance();
        return view('assistances.create', compact('assistance', 'classroom'));
    }

    public function store(CreateAssistanceRequest $request, Classroom $classroom)
    {
        $fields = $request->validated();
        $fields['classroom_id'] = $classroom->id;
        $meeting = Assistance::create($fields);

        $message = 'La reunión fue registrada correctamente';

        return redirect()->route('classrooms.assistances.index', $classroom->id)->with('success', $message);
    }

    public function show(Classroom $classroom, Assistance $assistance)
    {
        $classroom->loadCount('scheduledParticipants')
            ->load(['scheduledParticipants']);
//        $i = Inscription::find(11);
//        dd($i->assistances);
//        dd($classroom->scheduledParticipants->pivot, $i->assistances);
        return view('assistances.show', ['classroom' => $classroom, 'assistance' => $assistance]);
    }

    public function edit(Classroom $classroom, Assistance $assistance)
    {
        return view('assistances.edit', ['classroom' => $classroom, 'assistance' => $assistance]);
    }

    public function update(UpdateAssistanceRequest $request, Classroom $classroom, Assistance $assistance)
    {
        $fields = $request->validated();
        $fields['classroom_id'] = $classroom->id;
        $assistance->update($fields);

        $message = 'La asistencia fue actualizada correctamente';

        return redirect()->route('classrooms.assistances.index', $classroom->id)->with('success', $message);
    }

    public function destroy($id)
    {
        //
    }

    public function register(ClassroomAssistanceRequest $request, Classroom $classroom, Assistance $assistance) {
        $fields = $request->validated();

        $user_id = Auth::id();

        $participants_with_assistance = $assistance->inscriptions()->pluck('inscription_id')->toArray();

        $participants_relation = $fields['assistance'];

        foreach ($participants_relation as $inscription_id) {
            $assistance->inscriptions()->attach($inscription_id, ['user_created' => $user_id, 'user_modified' => $user_id]);
        }



        return back();
    }
}
