<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use App\Course;
use App\Company;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Doctrine\DBAL\Driver\AbstractDB2Driver;
use App\Http\Requests\Course\CreateCourseRequest;
use App\Http\Requests\Course\UpdateCourseRequest;

class CourseController extends controller

{
    function __construct() {
        $this->middleware('auth');
        $this->middleware('permission:course-list');
        $this->middleware('permission:course-create',['only'=>['create','store']]);
        $this->middleware('permission:course-edit',['only'=>['edit','update']]);
        $this->middleware('permission:course-delete',['only'=>['destroy']]);
    }

    public function index()
    {

        $courses = Course::with('category')->get();
        return view('courses.index', compact('courses'));

    }

    public function create()
    {
        $course = new Course();

        $categories = Category::query()
            ->select(['id', 'name'])
            ->orderBy('name')
            ->get();
        $companies = Company::query()
            ->select(['id', 'name'])
            ->orderBy('name')
            ->get();
        return view('courses.create', compact('course','categories', 'companies'));
    }

    public function store(CreateCourseRequest $request)
    {

        $fields = $request->validated();

        $course = Course::create($fields);
        if ($request->hasFile('image')) {
            $course->addMediaFromRequest('image')->toMediaCollection('courses');
        }
        $message = 'El curso "'. $course->name .'" de '. $course->hours.' fue registrado correctamente';
        return redirect()->route('courses.index')->with('success', $message);
    }

    public function show(Course $courses)
    {
        return view('courses.show',compact('courses'));
    }

    public function edit(Course $course)
    {
        $categories = Category::query()
            ->select(['id', 'name'])
            ->orderBy('name')
            ->get();
        $companies = Company::query()
            ->select(['id', 'name'])
            ->orderBy('name')
            ->get();


        return view('courses.edit', compact('course','categories', 'companies'));
    }

    public function update(UpdateCourseRequest $request,Course $course)
    {
        $fields = $request->validated();
        $course->update($fields);
        if ($request->hasFile('image')){
            $course->clearMediaCollection('courses');
            $course->addMediaFromRequest('image')->toMediaCollection('courses');
        }
        $message = 'El Curso: "'.$course->name.'" ha sido actualizado!';
        return redirect()->route('courses.index')->with('success', $message);
    }

    public function destroy( $id)
    {

    }
}
