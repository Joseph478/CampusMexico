<?php

namespace App\Observers;

use App\Test;
use App\TestUser;
use Carbon\Carbon;
use App\Inscription;
use Illuminate\Support\Arr;

class TestUserObserver
{
    /**
     * Handle the test user "created" event.
     *
     * @param  \App\TestUser  $testUser
     * @return void
     */
    public function created(TestUser $testUser)
    {

        //los array que almacenaran los intentos y la fecha
        $grade_tried = [];
        $grade_date = [];
        $testUser->load(['test']);

        // recuperamos las claves foraneas para recueperar el inscriptions
        $user_id =$testUser->user_id;
        $classroom_id = $testUser->test->classroom_id;

        $inscription =Inscription::where(['user_id' => $user_id , 'classroom_id' => $classroom_id])
            ->active()
            ->first();

        if($testUser->test->type == Test::REGULAR && !$inscription->grade_tried==null)
        {
            $grade_tried= $inscription->grade_tried;
            $grade_date=  $inscription->grade_date;
        }

        // si el examen es de inicio
        if($testUser->test->type == Test::BEGIN) {
            $inscription->update(['grade_begin' => $testUser->grade, 'grade_begin_date' => $testUser->created_at]);
        }

        elseif($testUser->test->type == Test::REGULAR){

            if($testUser->test->is_qualified == 1){
                array_push($grade_tried, $testUser->grade);
                array_push($grade_date, $testUser->created_at->format('Y-m-d H:i:s'));

                $inscription->update(['grade_tried' => $grade_tried , 'grade_date' => $grade_date]);
            }
        }

       //calculamos el valor de grade de inscription a travez del campo save_tried
        if($testUser->test->save_tried == '0' && $testUser->test->type == Test::REGULAR){
            $more_high=max($inscription->grade_tried);
            $inscription->update(['grade'=>$more_high ]);
        }
        elseif($testUser->test->save_tried == '1' && $testUser->test->type == Test::REGULAR){
            $recently= Arr::last($inscription->grade_tried);
            $inscription->update(['grade'=>$recently ]);
        }
        elseif($testUser->test->type == Test::REGULAR){
            $suma=array_sum ($inscription->grade_tried );
            $cantidadDeElementos = count($inscription->grade_tried);
            $average= $suma/ $cantidadDeElementos;

            $inscription->update(['grade'=>$average ]);
        }
        //$grade_tried = $inscription->grade_tried;
    }

    /**
     * Handle the test user "updated" event.
     *
     * @param  \App\TestUser  $testUser
     * @return void
     */
    public function updated(TestUser $testUser)
    {
        //
    }

    /**
     * Handle the test user "deleted" event.
     *
     * @param  \App\TestUser  $testUser
     * @return void
     */
    public function deleted(TestUser $testUser)
    {
        //
    }

    /**
     * Handle the test user "restored" event.
     *
     * @param  \App\TestUser  $testUser
     * @return void
     */
    public function restored(TestUser $testUser)
    {
        //
    }

    /**
     * Handle the test user "force deleted" event.
     *
     * @param  \App\TestUser  $testUser
     * @return void
     */
    public function forceDeleted(TestUser $testUser)
    {
        //
    }
}
