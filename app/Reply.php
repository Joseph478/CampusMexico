<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Reply
 *
 * @property int $id
 * @property int $user_id
 * @property int $classroom_content_id
 * @property string $start_date
 * @property string $end_date
 * @property string $state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply whereClassroomContentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reply whereUserId($value)
 * @mixin \Eloquent
 */
class Reply extends Model
{
    const ACTIVE = '1';
    const LOCKED = '0';

    public function scopeActive($q)
    {
        return $q->where('state', Reply::ACTIVE);
    }

    public function getActive() {
        return $this->active()->get();
    }

    public function isActive() {
        return $this->state = Reply::ACTIVE;
    }
}
