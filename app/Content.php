<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;



/**
 * App\Content
 *
 * @property int $id
 * @property int $course_id
 * @property int $type_id
 * @property string $name
 * @property string $description
 * @property string $atachment
 * @property int $child
 * @property int|null $reply
 * @property int|null $order
 * @property string $state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content whereAtachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content whereChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content whereReply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Content whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Content extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $table='contents';

    const ACTIVE = '1';
    const LOCKED = '0';

    protected $fillable = [
        'course_id',
        'type_id',
        'name',
        'description',
        'parent_id',
        'content_link',
        'reply',
        'order',
        'state',
    ];
    public function type() {
        return $this->belongsTo(Type::class);
    }
    public function course() {
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function bank() {
        return $this->hasMany(bank::class, 'course_id');
    }
    public function scopeActive($q)
    {
        return $q->where('state', Content::ACTIVE);
    }

    public function getActive() {
        return $this->active()->get();
    }

    public function isActive() {
        return $this->state = Content::ACTIVE;
    }

    public function scopeIsModule($q)
    {
        $type=Type::select('id')->where('name','=','Modulo')->first();

        return $q->where('type_id',$type->id);
    }

    public function scopeOnlyModules($q,$id)
    {
        $module=Content::where('course_id',$id)->first();

        return $q->where('course_id',$module->id);
    }

    public function scopeIsCourse($q,$id)
    {
        return $q->where('course_id',$id);
    }

    public function Eliminate($id)
    {
        Content::findOrFail($id)->update(['state'=> '0']);

        return $this->state = Content::LOCKED;
    }
    public function attachment() {
        if ($this->media->first()) {
            return $this->media->first()->getFullUrl();
        }
        return null;
    }
    public function ShowModule($module,$course)
    {

        if(!$course->id==null){
            dump(' vacio');

            return $this->$module=Content::select(['description','id'])->where('course_id',$course->id)->active();
        }else{
            dump('no vacio');
            return $this->$module;
        }
    }

}
