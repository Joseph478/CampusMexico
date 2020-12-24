<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Type;
use App\Http\Requests\CreateTypeRequest;

class TypeController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:type-list');
         $this->middleware('permission:type-create', ['only' => ['create','store']]);
         $this->middleware('permission:type-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:type-delete', ['only' => ['destroy']]);
    }
   
    public function index()
    {
        $type=Type::query()
        ->select(['id','name','description'])
        ->orderBy('types.id','asc')
        ->get();
        

        return view('types.index',compact('type'));
    }

    public function create(Type $type)
    {

        return view('types.create',compact('type'));
    }

    public function store(CreateTypeRequest $request)
    {
        $fields = $request->validated();

        $type = Type::create($fields);

        $message = 'El tipo de contenido"'. $type->name .' fue registrado correctamente';
        return redirect()->route('types.index')->with('success', $message);
    }

    public function show($id)
    {

    }

    public function edit(Type $type)
    {
       
        return view('types.edit',compact('type'));
    }

    public function update(CreateTypeRequest $request,Type $type)
    {
        
        $fields = $request->validated();

        $type->update($fields);

        $message = 'El tipo de contenido "'. $type->name .' fue actualizado correctamente';
        return redirect()->route('types.index')->with('success', $message);
    }

    public function destroy($id)
    {
        //
    }
}
