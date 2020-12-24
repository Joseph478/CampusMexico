<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    const ACTIVE = '1';
    const LOCKED = '0';

    protected $fillable = [
        'classroom_id',
        'meeting_date',
        'platform',
        'platform_id',
        'platform_password',
        'platform_url',
        'state'
    ];

    public function classroom () {
        return $this->belongsTo(Classroom::class);
    }

    /////////////////////////////////////////////////
    /// ASESSOR
    ////////////////////////////////////////////////

    public function getMeetingDateAttribute($value)
    {
        if (!$value) return $value;
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('app.date_format'));
    }

    /////////////////////////////////////////////
    /// MUTATOR
    ////////////////////////////////////////////
    public function setMeetingDateAttribute($value){
        $flat = Carbon::createFromFormat(config('app.date_format'), $value)->format('Y-m-d');
        $this->attributes['meeting_date'] = $flat;
    }
}
