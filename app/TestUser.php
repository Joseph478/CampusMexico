<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TestUser
 *
 * @property int $id
 * @property int $user_id
 * @property int $test_id
 * @property string $questions
 * @property string $answers
 * @property int $correct_answers
 * @property int $tried
 * @property int $time
 * @property string $state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestUser active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestUser whereAnswers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestUser whereCorrectAnswers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestUser whereQuestions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestUser whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestUser whereTestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestUser whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestUser whereTried($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestUser whereUserId($value)
 * @mixin \Eloquent
 */
class TestUser extends Model
{

    protected $casts = [
    'id' => 'int',
    'questions' => 'array',
    'answers' => 'array',
    'correct_answers' => 'array'
    ];

    protected $fillable =
    [
        'user_id','test_id','questions','answers','correct_answers','tried','time','grade'
    ];

    const ACTIVE = '1';
    const LOCKED = '0';

    public function participant() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function test() {
        return $this->belongsTo(Test::class,'test_id');
    }

    public function scopeActive($q)
    {
        return $q->where('state', TestUser::ACTIVE);
    }
    public function scopeOrderlyOrRandom($q)
    {
        foreach($this as $testuser)
        {
            dd($testuser);
        if($testuser->test->random==1){

            return $q->inRandomOrder();
        }
        }

    }

    public function getActive() {
        return $this->active()->get();
    }

    public function isActive() {
        return $this->state = TestUser::ACTIVE;
    }
}
