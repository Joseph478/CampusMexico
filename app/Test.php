<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Test
 *
 * @property int $id
 * @property int $classroom_id
 * @property string $description
 * @property string $random
 * @property int $time
 * @property int $tried
 * @property int $save_tried
 * @property int $is_view
 * @property string $start_date
 * @property string $end_date
 * @property int $number_question
 * @property int $is_promediable
 * @property string $state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereClassroomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereIsPromediable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereIsView($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereNumberQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereRandom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereSaveTried($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereTried($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Test extends Model
{
    const ACTIVE = '1';
    const LOCKED = '0';
    const SHOW='1';
    const HIDE='0';
    const QUALIFIED='1';
    const NO_QUALIFIED='0';
    const NO_RANDOM='0';
    const RANDOM='1';
    const REGULAR = '0';
    const BEGIN = '1';
    const ENCUESTA = '2';
    //const del campo save_tried
    const MORE_HIGH ='0';
    const RECENTLY = '1';
    const AVERAGE = '2';


    protected $fillable=[
        'classroom_id',
        'name',
        'random',
        'time',
        'tried',
        'save_tried',
        'view_answer',
        'start_date',
        'end_date',
        'number_question',
        'grade_max',
        'is_qualified',
        'state',
        'type'
    ];


    public function scopeUserTest($q,$user,$classroom)
    {
        return $q->where('test_users.user_id',$user->id)
        ->where('tests.classroom_id',$classroom->id);
    }
    public function scopeActive($q)
    {
        return $q->where('state', Test::ACTIVE);
    }

    public function getActive() {
        return $this->active()->get();
    }

    public function isActive() {
        return $this->state = Test::ACTIVE;
    }

    public function classroom() {

        return $this->belongsto(Classroom::class);
    }
    public function TestUser(){
        return $this->hasMany(TestUser::class);
    }

    public function inscriptions(){
        return $this->hasManyThrough(Inscription::class,classroom::class,'id','classroom_id');
    }
}
