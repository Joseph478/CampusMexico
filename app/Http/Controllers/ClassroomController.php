<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use App\Classroom;
use App\Test;
use App\Inscription;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Classroom\CreateClassroomRequest;

class ClassroomController extends Controller
{
    function __construct(){
        $this->middleware('auth');
        $this->middleware('permission:classroom-list')->only('index');
        $this->middleware('permission:classroom-create',['only'=>['create','store']]);
        $this->middleware('permission:classroom-edit',['only'=>['edit','update']]);
        $this->middleware('permission:classroom-delete',['only'=>['destroy']]);
    }

    public function index()
    {
        $user = Auth::user();

        $query = Classroom::query()
        ->with(['course'])
        ->withCount('scheduledParticipants');

        $classrooms = $query
            ->when($user->hasRole('facilitador'), function ($query) use ($user) {
                return $query->where('user_id','=', $user->id);
            })
            ->latest()
            ->get();

        $classrooms_count = count($classrooms);

        return view('classrooms.index',compact('classrooms', 'classrooms_count'));
    }

    public function list_participant(Classroom $classroom)
    {

        $user=Auth::user();
        $classroom=Classroom::with(['course','user'])
        ->orderBy('classrooms.id','asc')
        ->where('classrooms.user_id','=',$user->id)
        ->first();

        $inscriptions=Inscription::with(['classroom','participant'])
        ->join('classrooms','inscriptions.classroom_id','=','classrooms.id')
        ->join('users','users.id','=','inscriptions.user_id')
        ->select(['inscriptions.id','users.name','users.dni'])
        ->where('inscriptions.classroom_id','=',$classroom->id)
        ->get();

        return view('classroom.assistance',compact('inscription'));
        return view('classroom.assistance',compact('classroom'));
    }

    public function create()
    {
        $classroom = new Classroom();
        $facilitators = User::role('facilitador')->active()->get();
        $courses = Course::orderBy('name')->get();

        return view('classrooms.create',compact('classroom','courses','facilitators'));
    }

    public function store(CreateClassroomRequest $request)
    {
        $fields = $request->validated();
        $course = Course::findOrFail($fields['course_id']);
        $fields['name'] = $course->name;
        $fields['hour'] = $course->hour;
        $fields['grade_min'] = $course->grade_min;
        $fields['validity'] = $course->validity;
        $fields['type_validity'] = $course->type_validity;

        $classroom = Classroom::create($fields);

        $message = 'La programación del curso '. $classroom->name .' fue registrada correctamente';
        return redirect()->route('classrooms.index')->with('success', $message);
    }

    public function show($id)
    {
        $tests = Test::Where('classroom_id',$id)->get();
        return view('classrooms.show',compact('tests'));
    }

    public function edit(Classroom $classroom)
    {
        $facilitators = User::role('facilitador')->active()->get();
        $courses = Course::orderBy('name')->get();
        return view('classrooms.edit',compact('classroom','courses','facilitators'));
    }

    public function update(CreateClassroomRequest $request,Classroom $classroom)
    {

        $fields = $request->validated();
        $course = Course::findOrFail($fields['course_id']);
        $fields['name'] = $course->name;
        $fields['hour'] = $course->hour;
        $fields['grade_min'] = $course->grade_min;
        $fields['validity'] = $course->validity;
        $fields['type_validity'] = $course->type_validity;

        $classroom->update($fields);

        $message = 'La Programación del curso "'. $classroom->name .'" fue actualizada correctamente';
        return redirect()->route('classrooms.index')->with('success', $message);
    }

    public function destroy($id)
    {

    }
}
