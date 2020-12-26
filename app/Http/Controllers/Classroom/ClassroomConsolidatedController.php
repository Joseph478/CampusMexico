<?php

namespace App\Http\Controllers\Classroom;

use App\Classroom;
use App\Exports\ConsolidatedExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

    public function exportExcelConsolidated(Classroom $classroom)
    {
        return Excel::download(new ConsolidatedExport($classroom), 'consolidado del curso'. $classroom->name .'.xlsx');

    }
}
