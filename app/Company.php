<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Company
 *
 * @property int $id
 * @property string $ruc
 * @property string $name
 * @property string $address
 * @property string $state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereRuc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Company extends Model
{
    const ACTIVE = '1';
    const LOCKED = '0';

    protected $fillable = [
        'ruc',
        'name',
        'address',
    ];

    public function users() {
        return $this->HasMany(User::class)->withTimestamps();
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

    public function getActiveAttribute($value) {
        $type = " ";
        if ($value == 1) {
            $type = "Activo";
        }
        if ($value == 2) {
            $type = "Inactivo";
        }
        return $type;
    }
}
