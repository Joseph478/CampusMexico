<?php

namespace App\Http\Controllers\Courses;

use App\Test;
use App\Type;
use App\User;
use DateTime;
use App\Course;
use App\LoginDaily;
use App\Content;
use App\Classroom;
use Carbon\Carbon;
use App\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;
use phpDocumentor\Reflection\Types\Boolean;

class ParticipantsController extends Controller
{
    function __construct() {
        $this->middleware('auth');
        $this->middleware('permission:course-mine')->only('list');
    }

    public function list() {
    $date_actual = Carbon::now()->format('Y-m-d');

        $user = Auth::user();

        $classrooms = $user
            ->scheduled()
            ->with(['facilitator', 'course'])
            ->whereDate('start_datetime', '<=', $date_actual)
            ->whereDate('end_datetime', '>=', $date_actual)
            ->get();
        return view('courses.list',compact('user','classrooms'));

    }

    public function detail(Classroom $classroom, User $user) {


        $key=0;
        $c = $classroom
            ->load(['course.contents.type', 'tests', 'meetings'])
            ->course
            ->contents;

        $types = collect([]);

        $c->each(function ($item) use (&$types) {
            $types->push($item->type);
        });

        $types = $types->unique();


        $inscription =Inscription::where(['user_id' => $user->id , 'classroom_id' => $classroom->id])
        ->active()->firstOr(function () use($classroom,$user,$types,$key){

            return view('courses.detail', compact('classroom','user', 'types','key'));
        });

        if($classroom->test_begin_required == 1 && $inscription->grade_begin == null)
        {
            $key=1;
        }

            // LUIS VEGA
            $Isnull  = Inscription::where('id',$inscription->id)->select('first_access')->first()->first_access;
            $IsInscription = LoginDaily::where(['user_id' => Auth::id() , 'inscription_id' => $inscription->id])->get();

            if(is_null($Isnull))
            {
                $inscription = Inscription::find($inscription->id);
                $inscription->first_access = date('Y-m-d H:i:s');
                $inscription->save();
            }

            if(count($IsInscription)>0)
            {
                $daily = LoginDaily::find($IsInscription[0]->id);
                $daily->user_id = Auth::id();
                $daily->inscription_id = $inscription->id;
                $daily->count = $daily->count + 1;
                $daily->state = 1;
                $daily->save();
            }else{
                $daily = new LoginDaily;
                $daily->user_id = Auth::id();
                $daily->inscription_id = $inscription->id;
                $daily->count = 1;
                $daily->state = 1;
                $daily->save();
            }
            // FIN LUIS VEGA

            return view('courses.detail', compact('classroom','user', 'types','key'));
        }

        public function list_type(Classroom $classroom, Type $type) {
            $course = $classroom
                ->load('course')
                ->course()->first();

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
                'type' => $type,
                'classroom' => $classroom,
            ];
            return view('content.index', $get_context_data);
        }

        public function play(Classroom $classroom, Type $type, Content $content) {
            $get_context_data = [
                'type' => $type,
                'classroom' => $classroom,
                'content' => $content,
            ];
            return view('courses.play', $get_context_data);
        }
    }
