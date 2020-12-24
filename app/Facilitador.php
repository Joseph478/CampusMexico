<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Facilitador
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Company[] $companies
 * @property-read int|null $companies_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Facilitador newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Facilitador newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Facilitador query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User role($roles, $guard = null)
 * @mixin \Eloquent
 * @property-read mixed $full_name
 * @property mixed $name
 * @property-write mixed $email
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Classroom[] $classrooms
 * @property-read int|null $classrooms_count
 */
class Facilitador extends User
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
