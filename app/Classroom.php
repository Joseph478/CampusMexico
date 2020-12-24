<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


/**
 * App\Classroom
 *
 * @property int $id
 * @property int $course_id
 * @property int $user_id
 * @property string $type
 * @property string $start_datetime
 * @property string $end_datetime
 * @property string $vacancies
 * @property string $modality
 * @property string $is_free
 * @property string $token
 * @property string $name
 * @property int $hour
 * @property int $grade_min
 * @property int|null $validity
 * @property int|null $type_validity
 * @property string $state
 * @property string|null $platform
 * @property string|null $platform_id
 * @property string|null $platform_password
 * @property string|null $platform_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Course $course
 * @property-read mixed $num_inscriptions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Inscription[] $inscriptions
 * @property-read int|null $inscriptions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $participants
 * @property-read int|null $participants_count
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom whereEndDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom whereGradeMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom whereHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom whereIsFree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom whereModality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom wherePlatformId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom wherePlatformPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom wherePlatformUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom whereStartDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom whereTypeValidity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom whereVacancies($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Classroom whereValidity($value)
 * @mixin \Eloquent
 */
class Classroom extends Model
{
    const ACTIVE = '1';
    const LOCKED = '0';

    const TYPE_REGULAR = 'regular';
    const TYPE_EXTRAORDINARIO = 'extraordinario';

    const MODALITY_FACE_TO_FACE = 'presencial';
    const MODALITY_VIRTUAL = 'virtual';
    const MODALITY_BLENDED = 'semipresencial';

    const TEST_BEGIN_REQUIRED = '1';
    const TEST_BEGIN_NO_REQUIRED = '0';

    const IS_FREE = '1';
    const NO_FREE = '0';

    protected $fillable = [
        'course_id','user_id','type',
        'start_datetime','end_datetime',
        'token',
        'name','hour','grade_min','is_free',
        'validity','type_validity',
        'vacancies', 'modality',
        'test_begin_required',
    ];

    public function course() {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function facilitator() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function inscriptions() {
        return $this->hasMany(Inscription::class);
    }

    public function meetings() {
        return $this->hasMany(Meeting::class);
    }

    public function assistances() {
        return $this->hasMany(Assistance::class);
    }

    public function tests() {
        return $this->hasMany(Test::class);
    }

    public function participants() {
        return $this->belongsToMany(User::class, 'inscriptions', 'classroom_id', 'user_id')
            ->withPivot(['id', 'state'])
            ->withTimestamps();
    }

    public function scheduledParticipants() {
        return $this->participants()
            ->WherePivotNotIn('state', ['0']);
    }

    //query scope
    public function scopeActive($q)
    {
        return $q->where('state', Classroom::ACTIVE);
    }

    public function getActive() {
        return $this->active()->get();
    }

    public function isActive() {
        return $this->state = Classroom::ACTIVE;
    }

    //accessor

    public function getNameAttribute($value)
    {
        return Str::title($value);
    }

    public function getTypeAttribute($value)
    {
        return strtoupper($value);
    }

    public function getIsFree($value){
        if ($value =='1') return 'LIBRE';
        return 'DE PAGA';
    }

    public function getStartDatetimeAttribute($value)
    {
        if (!$value) return $value;
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('app.datetime_format'));
    }

    public function getEndDatetimeAttribute($value)
    {
        if (!$value) return $value;
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('app.date_format'));
    }

    // mutators
    public function startDatetimeLong() {
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $dia = Carbon::createFromFormat(config('app.datetime_format'), $this->start_datetime)->format('d');
        $mes = Carbon::createFromFormat(config('app.datetime_format'), $this->start_datetime)->format('n');
        $mes = $meses[$mes - 1];
        $anio = Carbon::createFromFormat(config('app.datetime_format'), $this->start_datetime)->format('Y');

        $fecha = $dia.' de '.$mes.' del '.$anio;

        return $fecha;
    }

    public function setStartDatetimeAttribute($value){
        $flat = Carbon::createFromFormat(config('app.datetime_format'), $value)->format('Y-m-d H:i:s');
        $this->attributes['start_datetime'] = $flat;
    }

    public function setEndDatetimeAttribute($value){
        $flat = Carbon::createFromFormat(config('app.date_format'), $value)->format('Y-m-d');
        $this->attributes['end_datetime'] = $flat;
    }
}
