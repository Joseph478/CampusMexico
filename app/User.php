<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;


/**
 * App\User
 *
 * @property int $id
 * @property string|null $dni
 * @property string $fname
 * @property string|null $lname
 * @property string $name
 * @property string|null $position
 * @property string|null $area
 * @property string $email
 * @property string $password
 * @property string|null $avatar
 * @property string|null $phone
 * @property string|null $last_login
 * @property string $state
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Classroom[] $classrooms
 * @property-read int|null $classrooms_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Company[] $companies
 * @property-read int|null $companies_count
 * @property-read mixed $full_name
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements HasMedia
{
    use Notifiable;
    use HasRoles;
    use HasMediaTrait;

    const ACTIVE = '1';
    const LOCKED = '0';

    protected $appends = ['full_name'];


    protected $fillable = [
        'company_id', 'dni', 'last_name', 'name', 'position', 'area', 'email', 'phone', 'state', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function company() {
        return $this->belongsTo(Company::class, 'company_id');

    }
    public function Tests(){
        return $this->hasManyThrough(Test::class,TestUser::class,'user_id','id');
    }
    public function inscriptions(){
        return $this->hasMany(Inscription::class);
    }

    public function classrooms() {
        return $this->belongsToMany(Classroom::class, 'inscriptions')
            ->using(Inscription::class)
            ->withPivot(['state'])
            ->withTimestamps();
    }

    public function scheduled() {
        return $this->belongsToMany(Classroom::class, 'inscriptions')
            ->withPivot(['id', 'grade', 'grade_begin', 'grade_tried', 'grade_min', 'state'])
            ->withTimestamps()
            ->WherePivotNotIn('state', ['0']);
    }

    public function setNameAttribute($valor)
    {
        $this->attributes['name'] = ucwords($valor);
    }

    public function setLastNameAttribute($valor)
    {
        $this->attributes['last_name'] = ucwords($valor);
    }
    public function setEmailAttribute($valor)
    {
        $this->attributes['email'] = strtolower($valor);
    }
    public function setDniAttribute($valor)
    {
        $this->attributes['dni'] = trim($valor);
    }

    public function getNameAttribute($valor)
    {
        return ucwords($valor);
    }

    /*
     * ///////////// Scoppe ////////////////
     * */

    public function scopeActive($q)
    {
        return $q->where('state', User::ACTIVE);
    }

    public function scopeThisCompany($q) {
        $user = Auth::user();
        return $q->where('company_id', $user->company_id)
            ->orWhere('company_id', 3);
    }

    public function getActive() {
        return $this->active()->get();
    }

    public function isActive() {
        return $this->state = User::ACTIVE;
    }

    public function getShortName()
    {
        return "{$this->name} {$this->last_name}";
    }

    public function getFullName()
    {
        return ucwords("{$this->last_name} {$this->name}");
    }

    public function getFullNameAttribute()
    {
        return ucwords("{$this->last_name} {$this->name}");
    }
    public function avatar(){

        if ($this->media->first()) {
            return $this->media->first()->getFullUrl('thumb');
        }
        return null;
    }

    public function registerMediaConversions(?Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(200)
            ->height(200);
    }
}
