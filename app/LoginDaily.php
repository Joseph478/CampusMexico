<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginDaily extends Model
{
    const ACTIVE = '1';
    const LOCKED = '0';

    protected $fillable = [
        'user_id', 'inscription_id', 'count', 'state'
    ];

}
