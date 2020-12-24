<?php

namespace App\Http\Controllers\Courses;

use App\Course;
use App\Http\Controllers\Controller;
use App\Type;
use Illuminate\Http\Request;

class CourseTypeController extends Controller
{
    function __construct() {
        $this->middleware('auth');
    }

    public function index(Course $course)
    {
        $types = Type::get();
        return view('courses.types', compact('course', 'types'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Course $course, Type $type)
    {
        $course
            ->loadCount(['contents' => function($query) use ($course, $type) {
                $query->where('course_id', $course->id)
                    ->where('type_id', $type->id);
            }])
            ->load(['contents' => function($query) use ($course, $type) {
                $query->where('course_id', $course->id)
                ->where('type_id', $type->id);
            }]);

        $get_context_data = [
            'course' => $course,
            'type' => $type
        ];
        return view('content.index', $get_context_data);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
