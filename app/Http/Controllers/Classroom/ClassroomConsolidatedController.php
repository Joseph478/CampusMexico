<?php

namespace App\Http\Controllers\Classroom;

use App\Classroom;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassroomConsolidatedController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    public function consolidated(Classroom $classroom)
    {

        $classroom->loadCount('scheduledParticipants')
            ->load('scheduledParticipants');

        return view('classrooms.consolidated',compact('classroom'));
    }
}
