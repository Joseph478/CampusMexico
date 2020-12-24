<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;



/**
 * App\Participant
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Company[] $companies
 * @property-read int|null $companies_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Inscription[] $inscriptions
 * @property-read int|null $inscriptions_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Participant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Participant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Participant query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User role($roles, $guard = null)
 * @mixin \Eloquent
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
 * @property-read mixed $full_name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Participant whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Participant whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Participant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Participant whereDni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Participant whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Participant whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Participant whereFname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Participant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Participant whereLastLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Participant whereLname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Participant whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Participant wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Participant wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Participant wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Participant whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Participant whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Participant whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Classroom[] $classrooms
 * @property-read int|null $classrooms_count
 */
class Participant extends User
{
    use HasRoles;

    protected $table = 'users';

    public function inscriptions() {
        return $this->hasMany(Inscription::class);
    }
    public function isActive() {
        return $this->state = Course::ACTIVE;
    }
    


}
