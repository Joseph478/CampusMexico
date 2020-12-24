<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ClassroomContent
 *
 * @property int $id
 * @property int $content_id
 * @property int $classroom_id
 * @property string $start_date
 * @property string $end_date
 * @property string $state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClassroomContent active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClassroomContent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClassroomContent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClassroomContent query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClassroomContent whereClassroomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClassroomContent whereContentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClassroomContent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClassroomContent whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClassroomContent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClassroomContent whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClassroomContent whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ClassroomContent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ClassroomContent extends Model
{
    const ACTIVE = '1';
    const LOCKED = '0';

    public function scopeActive($q)
    {
        return $q->where('state', ClassroomContent::ACTIVE);
    }

    public function getActive() {
        return $this->active()->get();
    }

    public function isActive() {
        return $this->state = ClassroomContent::ACTIVE;
    }
}
