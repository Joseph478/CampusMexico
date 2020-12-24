<?php

namespace App\Observers;

use App\Content;
use App\Course;

class CourseObserver
{

    public function created(Course $course)
    {
        Content::create([
            'course_id' => $course->id,
            'type_id' => 1,
            'name' => 'Modulo 1',
            'description' => $course->name,
            'order' => 1,
        ]);
    }

    /**
     * Handle the course "updated" event.
     *
     * @param  \App\Course  $course
     * @return void
     */
    public function updated(Course $course)
    {
        //
    }

    /**
     * Handle the course "deleted" event.
     *
     * @param  \App\Course  $course
     * @return void
     */
    public function deleted(Course $course)
    {
        //
    }

    /**
     * Handle the course "restored" event.
     *
     * @param  \App\Course  $course
     * @return void
     */
    public function restored(Course $course)
    {
        //
    }

    /**
     * Handle the course "force deleted" event.
     *
     * @param  \App\Course  $course
     * @return void
     */
    public function forceDeleted(Course $course)
    {
        //
    }
}
