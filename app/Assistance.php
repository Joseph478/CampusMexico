<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Assistance extends Model
{
    const ACTIVE = '1';
    const LOCKED = '0';

    const VIRTUAL = '1';
    const FACE_TO_FACE = '0';

    protected $fillable = [
        'classroom_id',
        'assistance_date',
        'is_virtual',
        'state',
        'user_created',
        'user_modified',
    ];

    public function classroom () {
        return $this->belongsTo(Classroom::class);
    }

    public function inscriptions () {
        return $this->belongsToMany(Inscription::class, 'assistance_inscription')
            ->withTimestamps();
    }

    /////////////////////////////////////////////////
    /// ASESSOR
    ////////////////////////////////////////////////

    public function getAssistanceDateAttribute($value)
    {
        if (!$value) return $value;
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('app.date_format'));
    }

    /////////////////////////////////////////////
    /// MUTATOR
    ////////////////////////////////////////////

    public function setAssistanceDateAttribute($value){
        $flat = Carbon::createFromFormat(config('app.date_format'), $value)->format('Y-m-d');
        $this->attributes['assistance_date'] = $flat;
    }
}
