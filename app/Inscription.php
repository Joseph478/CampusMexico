<?php

namespace App;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Inscription
 *
 * @property int $id
 * @property int $classroom_id
 * @property int $user_id
 * @property int $assistence
 * @property int $grade
 * @property int $grade_min
 * @property string $type
 * @property string $state
 * @property string|null $user_created
 * @property string|null $user_modified
 * @property string|null $user_deleted
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Participant $Participant
 * @property-read \App\Classroom $classroom
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inscription active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inscription query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inscription whereAssistence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inscription whereClassroomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inscription whereGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inscription whereGradeMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inscription whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inscription whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inscription whereUserCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inscription whereUserDeleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inscription whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inscription whereUserModified($value)
 * @mixin \Eloquent
 * @property string|null $assistance
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\User $participant
 * @method static \Illuminate\Database\Query\Builder|\App\Inscription onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inscription whereAssistance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inscription whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Inscription withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Inscription withoutTrashed()
 */
class Inscription extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'classroom_id',
        'user_id',
        'assistance',
        'grade_min',
        'type',
        'user_created',
        'user_modified',
        'user_deleted',
        'grade_tried',
        'grade_begin',
        'grade_begin_date',
        'grade',
        'grade_date',
        'first_access',
        'state',
        'updated_at'

    ];

    protected $casts =[
        'grade_tried' => 'array',
        'grade_date' => 'array',
    ];
    protected $appends = ['last_date'];

    protected $dates = [
        'created_at', 'updated_at', 'grade_begin_date', 'first_access',
    ];

    const RESCHEDULED = '2';
    const ACTIVED = '1';
    const ANULATE = '0';

    public function classroom() {
        return $this->belongsTo(Classroom::class);
    }

    public function participant() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function assistances() {
        return $this->belongsToMany(Assistance::class, 'assistance_inscription')
            ->withTimestamps();
    }
    public function getLastDateAttribute()
    {
        $array_date=Arr::last($this->grade_date);
        return $array_date;
    }

    public function getStateAttribute ($value) {
        if ($value == '1') return 'Activo';
        if ($value == '0') return 'Anulado';
        return 'Reprogramado';
    }

    public function scopeActive($q)
    {
        return $q->where('state', Inscription::ACTIVED);
    }

    public function getActive() {
        return $this->active()->get();
    }

    public function isActive() {
        return $this->state = Inscription::ACTIVED;
    }
}
