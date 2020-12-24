<?php

namespace App\Http\Controllers\Courses;

use App\Certificate;
use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseCertificateController extends Controller
{
    function __construct() {
        $this->middleware('auth');
    }

    public function index(Course $course)
    {
        $course = $course->load(['certificates' => function($query) {
            $query->with('media');
        }]);
        return view('certificate_course.index',compact('course'));
    }

    public function create(Course $course)
    {
        $certificates = Certificate::all();
        return view('certificate_course.create',compact('certificates','course'));
    }

    public function store(Request $request,Course $course)
    {
        $certificates = $request->certificate_ids;
        $course->certificates()->sync($certificates);
        $message = 'se agrego correctamente el certificado al curso: ' .$course->name. '.';
        return redirect()->route('courses.certificates.index', $course->id)->with('success', $message);
    }

    public function destroy( $id)
    {

    }
}
