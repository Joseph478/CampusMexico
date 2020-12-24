<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

/**
 * App\Certificate
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string|null $template
 * @property string $state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Certificate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Certificate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Certificate query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Certificate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Certificate whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Certificate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Certificate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Certificate whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Certificate whereTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Certificate whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Certificate active()
 */
class Certificate extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $guarded = [];

    const ACTIVE = '1';
    const LOCKED = '0';

    protected $fillable =[
        'name','description','template'
    ];


    public function courses()
    {
        return $this->belongsToMany(Course::class,'certificate_course','certificate_id','course_id')->withPivot('state');
    }

    public function scopeActive($q)
    {
        return $q->where('state', Type::ACTIVE);
    }

    public function getActive() {
        return $this->active()->get();
    }

    public function isActive() {
        return $this->state = Type::ACTIVE;
    }

    public function image() {
        if ($this->media->first()) {
            return $this->media->first()->getFullUrl('thumb');
        }
        return null;
    }

    // public function registerMediaConversions(?Media $media = null)
    // {
    //     $this->addMediaConversion('thumb')
    //         ->width(300)
    //         ->height(300);
    // }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
              ->width(200)
              ->height(200)
              ->sharpen(10);

        $this->addMediaConversion('square')
              ->width(412)
              ->height(412)
              ->sharpen(10);
    }
}
