<?php

namespace App\Observers;

use App\Classroom;

class ClassroomObserver
{
    /**
     * Handle the classroom "created" event.
     *
     * @param  \App\Classroom  $classroom
     * @return void
     */
    public function created(Classroom $classroom)
    {

    }

    /**
     * Handle the classroom "updated" event.
     *
     * @param  \App\Classroom  $classroom
     * @return void
     */
    public function updated(Classroom $classroom)
    {
        //
    }

    /**
     * Handle the classroom "deleted" event.
     *
     * @param  \App\Classroom  $classroom
     * @return void
     */
    public function deleted(Classroom $classroom)
    {
        //
    }

    /**
     * Handle the classroom "restored" event.
     *
     * @param  \App\Classroom  $classroom
     * @return void
     */
    public function restored(Classroom $classroom)
    {
        //
    }

    /**
     * Handle the classroom "force deleted" event.
     *
     * @param  \App\Classroom  $classroom
     * @return void
     */
    public function forceDeleted(Classroom $classroom)
    {
        //
    }
}
