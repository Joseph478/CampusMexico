<?php

namespace App\Http\Controllers\Classroom;

use Auth;
use App\Test;
use App\User;
use DateTime;
use App\Classroom;
use Carbon\Carbon;
use App\Inscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTestRequest;
use App\TestUser;
use PhpParser\Node\Expr\New_;

class TestController extends Controller
{
    function __construct(){
        $this->middleware('auth');
        $this->middleware('permission:test-list');
        $this->middleware('permission:test-create',['only'=>['create','store']]);
        $this->middleware('permission:test-edit',['only'=>['edit','update']]);
        $this->middleware('permission:test-delete',['only'=>['destroy']]);
    }

    public function list(Classroom $classroom,$key=null)
    {
        $disabled=false;
        $user = Auth::user();
        //Obtenemos la fecha actual para aumentarle 30 minutos
        $date_now = new DateTime(Carbon::now()->format('Y-m-d H:i:s'));

        $inscription=Inscription::where(['user_id' => $user->id, 'classroom_id' => $classroom->id])->active()->firstOr(function () use($classroom){
            return view('tests.index', compact('classroom','disabled'));
        });

        if(!$inscription->grade_date == null){

        $array_date= $inscription->grade_date;

        $last_tried = end($array_date);
        $last_tried_date = new DateTime($last_tried);
        $last_tried_date->modify('+1 minute')->format('Y-m-d H:i:s');
        //comparamos las fechas para ver si se desabilitará la opcion o se
        //habilitara
        if($last_tried_date > $date_now ){
            $disabled = true;
        }elseif($inscription->grade >= $inscription->grade_min)
        {
            $disabled = true;
        }
        }
        //comparamos los permisos key que resivimos para determinar si la vista
        //se filtrara
        if($key==Test::BEGIN)
        {
            $classroom->load(['tests'=>function($query) use($user){

                    $query->where(['type' => Test::BEGIN]);

                    $query->with(['testuser'=>function($query) use($user){
                        $query->where('user_id',$user->id);
                    }])->active();

            }]);

        }else{

            $classroom->load(['tests'=>function($query) use($user){
                $query->with(['testuser'=>function($query) use($user){
                    $query->where('user_id',$user->id);

                }]);
            }]);

        }

        if($inscription->assistance != 'A')
        {
            $disabled=true;
        }

        return view('tests.index',compact('classroom','disabled'));
    }
    public function index(Classroom $classroom)
    {

    }

    public function create(Classroom $classroom)
    {
        $test = new Test();
        return view('tests.create', compact('test','classroom'));
    }

    public function store(CreateTestRequest $request, Classroom $classroom)
    {
        $fields = $request->validated();
        $fields['classroom_id'] = $classroom->id;

        $test = Test::create($fields);

        $message = 'La evaluacion "'. $test->name .' fue registrado correctamente';

        return redirect()->route('classrooms.list', $classroom->id)->with('success', $message);
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
    public function edit($id)
    {
        // $classrooms =Classroom::query()
        //             ->select(['id','name'])
        //             ->orderby('name')
        //             ->get();
        // return view('classrooms.create',compact('classroom','tests'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
