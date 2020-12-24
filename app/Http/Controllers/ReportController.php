<?php

namespace App\Http\Controllers;
use App\Exports\ReportsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Inscription;
use App\Course;
use App\Exports\ReportDetailGrade;
use DB;

class ReportController extends Controller
{
    public function index()
    {
        $courses = Course::getActive();
        return view('reports.general',compact('courses'));

    }
    public function exportExcel(Request $request)
    {
        ini_set('max_execution_time', 720000);
        ini_set('memory_limit', -1);

        $file= public_path(). "/files/consolidado.xlsx";

        $start = $request->input('start_date');
        $end = $request->input('end_date');
        $course_id = $request->input('course_id');


        $export = new ReportsExport($start, $end, $course_id);
        return Excel::download($export, 'reporte.xlsx');

    }

    public function exportDetailGrade()
    {
        ini_set('max_execution_time', 720000);
        ini_set('memory_limit', -1);

        $export = new ReportDetailGrade;
        return Excel::download($export, 'reporte.xlsx');
    }
}
