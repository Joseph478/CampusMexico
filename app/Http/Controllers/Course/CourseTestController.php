<?php

namespace App\Http\Controllers\Course;

use Auth;
use App\Bank;
use App\Test;
use DateTime;
use App\TestUser;
use App\Classroom;
use App\Inscription;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\Course\CreateCourseTestRequest;

class CourseTestController extends Controller
{
    function __construct(){

        $this->middleware('permission:course-test-mine');
        $this->middleware('permission:course-test-create',['only'=>['create','store']]);
        $this->middleware('permission:course-test-edit',['only'=>['edit','update']]);
        $this->middleware('permission:course-test-delete',['only'=>['destroy']]);
    }

    public function test(Classroom $classroom,Test $test )
    {
        $date = Carbon::now()->format('Y-m-d H:i:s');
        $classroom->load(['course.banks' => function($query) use($test) {
            if($test->random == 1)
            {
                $query->inRandomOrder()->limit($test->number_question)->where('banks.parent_id',null)->whereIn('type' ,[$test->type,Bank::EXTRAORDINARY])->with(['childs']);
            }else{
                $query->limit($test->number_question)->where('banks.parent_id',null)->whereIn('type' ,[$test->type,Bank::EXTRAORDINARY])->with(['childs']);
            }
        }])->get();

        return view('tests.test',compact('classroom','test','date'));
    }

    public function register(CreateCourseTestRequest $request,Classroom $classroom,Test $test) {
        #recives solo el array de examen
        $inputs = $request->validated(); ### tienes q recivir el tiemp que demor en dar el examen
        $date_start= new Datetime($inputs['date']);
        $date_end = new DateTime(Carbon::now()->format('Y-m-d H:i:s'));

        $hour_calculated = date_diff($date_start,$date_end);
        $hour=$hour_calculated->format("%H:%I:%S");

        $questions = [];
        $answers = [];
        # usaurio que dio el examen
        $user = Auth::user();
        # recorremos el arreglo para poder divridirlos en arrays distitnos
        foreach($inputs['inputs'] as $key => $value) {
            array_push($questions, $key);
            array_push($answers, $value);
        }
        # recupperamos las respuestas correctas y alamacenamos en un array
        $correct_answers= Bank::with(['parent' => function($query) use($questions){
            $query->whereIn('id',$questions);
        }])
        ->whereHas('parent',function($query) use($questions){
            $query->whereIn('id',$questions);
        })
        ->where('is_correct',1)
        ->pluck('id')->toArray();

        # calculamos el nro de respuestas correctas del participante
        $number_correct_answer = count(array_intersect($answers,$correct_answers));

        # calculamos el valor de cada pregunta
        $question_value = $test->grade_max / $test->number_question;

        # calculamos la nota de partcipante
        $grade = round($question_value *$number_correct_answer);

        $tried = TestUser::where([
            'user_id' => $user->id,
            'test_id' => $test->id
            ])->count();

        # almacenamos el regitros de test user
        $test_user = TestUser::create([

            'user_id' => $user->id,
            'test_id' => $test->id,
            'questions' => $questions,
            'answers' => $answers,
            'correct_answers' => $correct_answers,
            'tried' => $tried+1,
            'time' => $hour,
            'grade' => $grade
        ]);

        $message = 'El Examen: "'. $test->name .'" del participante: '. $user->name.' fue Guardado correctamente';
        return redirect()->route('courses.test.result',compact('classroom','test_user'))->with('success', $message);
    }

        public function result(Classroom $classroom,TestUser $test_user)
        {

            $message=false;
            $aprobed=true;
            $test= Test::where(['id' => $test_user->test_id])->with(['testuser'=>function($query) use($test_user){
                $query->where('user_id',$test_user->user_id);
            }])->first();

            $inscription =Inscription::where(['user_id' => $test_user->user_id , 'classroom_id' => $classroom->id])->active()->first();

            if($test->tried- $test->testuser->count()>0){
                $message=true;
            }
            if($test_user->grade < $inscription->grade_min){
                $aprobed=false;
            }

            return view('tests.result',compact('classroom','test_user','test','aprobed','message'));
        }
        public function encuesta(Classroom $classroom,TestUser $test_user)
        {
            $classroom->load('course');

            return view('tests.encuesta',compact('classroom','test_user'));
        }
        public function detail(Classroom $classroom,TestUser $test_user)
        {
            return view('tests.detail',compact('test_user','classroom','message'));
        }
}
