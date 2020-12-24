<?php

namespace App\Observers;

use App\Assistance;
use Illuminate\Support\Facades\Auth;

class AssistanceObserver
{
    public function created(Assistance $assistance)
    {
        $assistance->user_created = Auth::id();
        $assistance->user_modified = Auth::id();
        $assistance->save();
    }

    public function creating(Assistance $assistance)
    {
        //
    }

    public function updated(Assistance $assistance)
    {
        //
    }

    public function updating(Assistance $assistance)
    {
        $assistance->user_modified = Auth::id();
    }

    public function deleted(Assistance $assistance)
    {
        //
    }

    /**
     * Handle the assistance "restored" event.
     *
     * @param  \App\Assistance  $assistance
     * @return void
     */
    public function restored(Assistance $assistance)
    {
        //
    }

    /**
     * Handle the assistance "force deleted" event.
     *
     * @param  \App\Assistance  $assistance
     * @return void
     */
    public function forceDeleted(Assistance $assistance)
    {
        //
    }
}
