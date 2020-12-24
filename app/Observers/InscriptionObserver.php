<?php

namespace App\Observers;

use App\Content;
use App\Inscription;
use Illuminate\Support\Facades\Auth;

class InscriptionObserver
{
    /**
     * Handle the inscription "created" event.
     *
     * @param  \App\Inscription  $inscription
     * @return void
     */
    public function created(Inscription $inscription)
    {
        //
    }

    public function updated(Inscription $inscription)
    {
        //
    }
    public function deleting(Inscription $inscription)
    {
        $inscription->classroom()->increment('vacancies', 1);
        $inscription->state = Inscription::ANULATE;
        $inscription->user_deleted = Auth::id();
        $inscription->save();
    }

    public function deleted(Inscription $inscription)
    {

    }

    public function restored(Inscription $inscription)
    {
        //
    }

    public function forceDeleted(Inscription $inscription)
    {
        //
    }
}
