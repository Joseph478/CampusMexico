<?php

namespace App\Http\Controllers\Classroom;

use App\Classroom;
use App\Exports\ConsolidatedExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Assistance\UploadRequest;
use App\Imports\ConsolidatedInscriptionImport;
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

    public function importExcelConsolidated(UploadRequest $request, Classroom $classroom)
    {
        $fields = $request->validated();
        Excel::import(new ConsolidatedInscriptionImport($classroom), $fields['file']);

        return redirect()->back()->with('success', 'El excel fue cargado correctamente correctamente');
    }
}
