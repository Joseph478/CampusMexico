<?php

namespace App\Http\Controllers\Classroom;

use App\Classroom;
use App\Http\Controllers\Controller;
use App\Http\Requests\Meeting\CreateMeetingRequest;
use App\Http\Requests\Meeting\UpdateMeetingRequest;
use App\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    function __construct() {
        $this->middleware('auth');
    }

    public function index(Classroom $classroom)
    {
        $classroom->load(['meetings']);
        return view('meetings.index', compact('classroom'));
    }

    public function create(Classroom $classroom)
    {
        $meeting = new Meeting();
        return view('meetings.create', compact('meeting', 'classroom'));
    }

    public function store(CreateMeetingRequest $request, Classroom $classroom)
    {
        $fields = $request->validated();
        $fields['classroom_id'] = $classroom->id;

        $meeting = Meeting::create($fields);

        $message = 'La reunión fue registrada correctamente';

        return redirect()->route('classrooms.meetings.index', $classroom->id)->with('success', $message);
    }

    public function show($id)
    {
        //
    }

    public function edit(Classroom $classroom, Meeting $meeting)
    {
        return view('meetings.edit', ['classroom' => $classroom, 'meeting' => $meeting]);
    }

    public function update(UpdateMeetingRequest $request, Classroom $classroom, Meeting $meeting)
    {
        $fields = $request->validated();
        $fields['classroom_id'] = $classroom->id;
        $meeting->update($fields);

        $message = 'La reunión fue actuizada correctamente';


        return redirect()->route('classrooms.meetings.index', $classroom->id)->with('success', $message);
    }

    public function destroy($id)
    {
        //
    }
}
