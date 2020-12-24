<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Course;
use App\Http\Requests\CreateCourseRequest;
use DB;


class CategoryController extends Controller
{
    function __construct(){
        $this->middleware('permission:category-list');
        $this->middleware('permission:category-create',['only'=>['create','store']]);
        $this->middleware('permission:category-edit',['only'=>['edit','update']]);
        $this->middleware('permission:category-delete',['only'=>['destroy']]);
    }

    public function index()
    {
        $categories = Category::get();
         /* $categories = Category::select('categories.id','categories.name','categories.description')
                    ->where('state',1)
                    ->get();*/
        return view('categories.index', compact('categories'));
    }

    public function create(Category $categories)
    {
        
        return view('categories.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $fields = $this->validate($request ,[
            'name' => 'required',
            'description' => 'required',
        ],
        [
            'name.required' => 'El nombre es requerido',
            'description.required' => 'Dirección es requerida',
        ]);
        
        
        $category = Category::create($fields);
        $message = 'La categoria "'. $category->name .' fue registrada correctamente';
        return redirect()->route('categories.index')->with('success', $message);

    }

    public function show($id)
    {
        $categories=Category::findOrFail($id);
        return view('categories.show',compact('categories'));
    }


    public function edit($id)
    {
        $categories=Category::findOrFail($id);
        return view('categories.edit', compact('categories'));
    }


    public function update(Request $request,$id)
    {
        
        $fields = $this->validate($request ,[
            'name' => 'required',
            'description' => 'required',
        ],
        [
            'name.required' => 'El nombre es requerido',
            'description.required' => 'Dirección es requerida',
        ]);
        $categories= Category::findOrFail($id);
        $categories->update($fields);
       
        $message='Fue Agregado la categoria:' .$categories->name. 'Correctamente';
        return redirect()->route('categories.index')->with('success',$message);
    }


    public function destroy(Request $request, $id)
    {

    }
}


