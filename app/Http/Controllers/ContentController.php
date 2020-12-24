<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\content;
use App\Http\Requests\CreateContentRequest;
use DB;

class ContentController extends Controller
{
    function __construct(){
        $this->middleware('permission:content-list');
        $this->middleware('permission:content-create',['only'=>['create','store']]);
        $this->middleware('permission:content-edit',['only'=>['edit','update']]);
        $this->middleware('permission:content-delete',['only'=>['destroy']]);
        }

        public function index()
        {
            $contents = Content::select('contents.title','contents.is_question','contents.is_correct','contents.name as name')
                        ->join('contents','contents.id','=','contents.content_id')
                        ->where('contents.state',1)
                        ->get();

            return view('contents.index', compact('contents'));
        }

        public function create(Content $contents)
        {
            $contents=Content::pluck('name','id');
            return view('contents.create',compact('contents','contents'));
        }

        public function store(CreateContentRequest $request)
        {
            $fields = $request->validated();
            $contents = Content::create($fields);
            $message = 'El banco de preguntas "'. $contents->title .' fue registrado correctamente';
            return redirect()->route('contents.index')->with('success', $message);

        }

        public function show($id)
        {
            $contents=Content::findOrFail($id);
            return view('contents.show',compact('contents'));
        }


        public function edit(Content $contents,$id)
        {
            $content=Content::pluck('name','id');
            $contents::findOrFail($id);
            return view('contents.edit', compact('contents','contents'));
        }


        public function update(CreateContentRequest $request, Content $contents)
        {

            $fields = $request->validated();
            $contents->update($fields);
            $message = 'El banco de preguntas "'. $contents->title .' fue actualizado correctamente';
            return redirect()->route('contents.index')->with('success', $message);
        }

}
