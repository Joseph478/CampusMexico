<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\content;
use App\Course;
use App\Type;
use App\Http\Requests\CreateContentRequest;
use App\Http\Requests\CreateModelRequest;

class ModuleController extends Controller
{

    public function index(Course $course)
    {

        $modules = Content::query()->select(['id','name','course_id'])
        ->with(['type','course'])
        ->isCourse($course->id)
        ->isModule()
        ->active()
        ->get();


        return view('modules.index', compact('modules','course'));
    }


    public function create(Content $module,Course $course)
    {

        return view ('modules.create',compact('module','course'));
    }

    public function store(CreateModelRequest $request,Course $course)
    {
        $fields = $request->validated();

        $fields['course_id']=$course->id;

        $module = Content::create($fields);

        $message = 'El Modulo "'. $module->name .' fue registrado correctamente';
        return redirect()->route('modules.index',$course->id)->with('success', $message);
    }


    public function show(Content $module, Course $course)
    {

        if(!$course->id==null){
            $modules=Content::select(['description','id','name'])
            ->where('course_id',$course->id)->active()->get();

        }
        return view ('modules.show',compact('module','modules','course'));
    }


    public function edit(Content $module)
    {

        $course=Course::findOrFail($module->course_id);

        return view ('modules.edit',compact('module','course'));
    }


    public function update(CreateModelRequest $request,Content $module)
    {

        $fields = $request->validated();
        $fields['course_id']=$module->course_id;

        $module ->update($fields);

        $message = 'El Modulo "'. $module->name .' fue actualizado correctamente';
        return redirect()->route('modules.index',$module->course_id)->with('success', $message);
    }


    public function destroy(Content $module)
    {
        $module->Eliminate($module->id);
        return redirect()->back()->with('danger','El modulo:  '.$module->name .' en la fecha '. $module->created_at .' fue Eliminado con exito');
    }
}
