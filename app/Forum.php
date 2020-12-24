<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Forum
 *
 * @property int $id
 * @property int $course_id
 * @property int $user_id
 * @property string $title
 * @property string $description
 * @property int $child
 * @property string $state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Forum active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Forum newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Forum newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Forum query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Forum whereChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Forum whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Forum whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Forum whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Forum whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Forum whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Forum whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Forum whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Forum whereUserId($value)
 * @mixin \Eloquent
 */
class Forum extends Model
{
    const ACTIVE= '1';
    const LOCKED = '0';
    const TEXT_ACTIVE = 'Respondido';
    const TEXT_LOCKED = 'Pendiente';

    protected $fillable=
    [
        'user_id','email','title'
    ];
    public function state($id)
    {
        if($id ==0)
        {
            return Forum::TEXT_ACTIVE;
        }else
        {
            return Forum::TEXT_LOCKED;
        }

    }
    public function count_coments($forum)
    {
        return $forum->where('parent_id',$forum->id)->count();

    }
    public function users(){
        return $this->belongsTo(User::class);
    }

    public function scopeActive($q)
    {
        return $q->where('state', Client::ACTIVE);
    }

    public function getActive() {
        return $this->active()->get();
    }

    public function isActive() {
        return $this->status = Client::ACTIVE;
    }
}
