<?php

namespace App\Http\Controllers;

use DB;
use App\Bank;
use App\Course;
use App\Content;
use App\Imports\BanksImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CreateBankRequest;

class BankController extends Controller
{
    function __construct(){
    $this->middleware('permission:bank-list');
    $this->middleware('permission:bank-create',['only'=>['create','store']]);
    $this->middleware('permission:bank-edit',['only'=>['edit','update']]);
    $this->middleware('permission:bank-delete',['only'=>['destroy']]);
    }
    public function index()
    {
    }
    public function list(Course $course, Content $module)
    {

        $banks = Bank::query()->select(['banks.id','banks.title','banks.content_id'])
                    ->with(['content'])
                    ->MyModule($module)
                    ->OnlyModules($course->id)//solo modulos que pertenecen el curso
                    ->where('banks.state','=',1)
                    ->OnlyQuestion()
                    ->get();

        return view('banks.index', compact('banks','course','module'));
    }
    public function save(Bank $bank, Course $course)
    {
        $contents=Content::OnlyModules($course->id)->pluck('name','id');

        return view('banks.questions.create',compact('bank','course','contents'));
    }


    public function store(CreateBankRequest $request,Bank $bank)
    {

        $bank->CreateBank($request,$bank);
        $message = 'El banco de preguntas "'. $bank->title .' fue registrado correctamente';
        return redirect()->route('banks.list',$request->course_id)->with('success', $message);

    }
    public function import(Request $request)
    {
        $file = $request->file('file_up');

        Excel::import(new BanksImport, $file);
        return back()->with('success', 'Se actualizaron las datos');
    }

    public function show($id)
    {
        $banks=Bank::findOrFail($id);
        return view('banks.show',compact('banks'));
    }


    public function edit(Bank $bank)
    {
        $contents=Content::pluck('name','id');

        return view('banks.edit', compact('bank','contents'));
    }
    public function destroy(Bank $bank)
    {
        $bank->Eliminate($bank->id);

        return redirect()->back()->with('danger','El Banco:  '.$bank->title .' en la fecha '. $bank->created_at .' fue Eliminado con exito');
    }


    public function update(CreateBankRequest $request, Bank $banks)
    {


        $fields = $request->validated();
        $banks->update($fields);
        $message = 'El banco de preguntas "'. $banks->title .' fue actualizado correctamente';
        return redirect()->route('banks.index')->with('success', $message);
    }

}
