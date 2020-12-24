<?php

namespace App\Http\Controllers\Courses;

use App\Content;
use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\Course\CreateCourseContentRequest;
use App\Http\Requests\Course\UpdateCourseContentRequest;
use App\Type;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Http\Request;

class CourseTypeContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create(Course $course, Type $type)
    {
        $get_context_data = [
            'content' => new Content(),
            'course' => $course,
            'type' => $type,
        ];

        return view('content.create', $get_context_data);
    }

    public function store(CreateCourseContentRequest $request, Course $course, Type $type)
    {

        $fields = $request->validated();
        $fields['course_id'] = $course->id;
        $fields['type_id'] = $type->id;


        $content = Content::create($fields);
        if ($request->hasFile('attachment')) {
            $content->addMediaFromRequest('attachment')->toMediaCollection($content->type->name);
        }

        $message = 'El '. $type->name . ' "'. $content->name .'" fue registrado correctamente';
        return redirect()->route('courses.types.show', [$course->id, $type->id])->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Type $type,Content $content)
    {

        $get_context_data = [
            'content' => $content,
            'course' => $course,
            'type' => $type,
        ];
        return view('content.edit', $get_context_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseContentRequest $request, Course $course, Type $type, Content $content)
    {
        $fields = $request->validated();
        $fields['course_id'] = $course->id;
        $fields['type_id'] = $type->id;


        $content->update($fields);
        if ($request->hasFile('attachment')){
            $content->clearMediaCollection($content->type->name);
            $content->addMediaFromRequest('attachment')->toMediaCollection($content->type->name);
        }

        $message = 'El '. $type->name . ' "'. $content->name .'" fue Actualizado correctamente';
        return redirect()->route('courses.types.show', [$course->id, $type->id])->with('success', $message);
    }

    public function download_content(Media $media){
        return $media;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
