<?php

namespace App\Http\Controllers\Courses;

use App\Course;
use App\Http\Controllers\Controller;
use App\Type;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index(Course $course) {
        $types = Type::get();
        return view('courses.content', compact('course', 'types'));
    }
}
