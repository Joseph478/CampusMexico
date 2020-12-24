<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use App\Bank;
/**
 * App\Course
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $hour
 * @property int $grade_min
 * @property string|null $temary
 * @property int $is_free
 * @property int $is_certificate
 * @property string|null $image
 * @property int $validity
 * @property int $type_validity
 * @property string $state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Classroom[] $classrooms
 * @property-read int|null $classrooms_count
 * @property-read \App\Client $client
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereGradeMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereIsCertificate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereIsFree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereTemary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereTypeValidity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereValidity($value)
 * @mixin \Eloquent
 * @property int $category_id
 * @property int|null $company_id
 * @property-read \App\Category $category
 * @property-read \App\Company|null $company
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Course whereCompanyId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read int|null $media_count
 */

class Course extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'category_id', 'company_id', 'name',
        'description','hour',
        'grade_min',
        'is_certificate',
        'temary',
        'validity',
        'type_validity',
    ];

    const NOT_CERTIFICATE = '0';
    const IS_CERTIFICATE = '1';
    const ACTIVE = '1';
    const LOCKED = '0';

    public function company() {
        return $this->belongsTo(Company::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function Banks(){
    return $this->hasManyThrough(Bank::class,Content::class);
    }

    public function certificates()
    {
        return $this->belongsToMany(Certificate::class,'certificate_course','course_id','certificate_id')
        ->withPivot('state');
    }

    public function contents() {
        return $this->hasMany(Content::class);
    }

    public function contentsType() {
        return $this->hasMany(Content::class)->where('parent_id', $this->parent_id);
    }

    public function scopeActive($q)
    {
        return $q->where('state', self::ACTIVE);
    }

    public static function getActive() {
        return self::query()->active()->get();
    }

    public function isActive() {
        return $this->state = Course::ACTIVE;
    }

    public function image() {
        if ($this->media->first()) {
            return $this->media->first()->getFullUrl('thumb');
        }
        return null;
    }

    public function registerMediaConversions(?Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(300)
            ->height(300);
    }
}
