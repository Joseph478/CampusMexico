<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Content;
use Illuminate\Support\Arr;


/**
 * App\Bank
 *
 * @property int $id
 * @property int $content_id
 * @property string $title
 * @property int $is_question
 * @property int $is_correct
 * @property int $child
 * @property string $state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bank active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bank newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bank newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bank query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bank whereChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bank whereContentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bank whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bank whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bank whereIsCorrect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bank whereIsQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bank whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bank whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bank whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Bank extends Model
{
    protected $fillable=[
    'content_id','title','is_question','is_correct','parent_id','state',
    ];
    const ACTIVE = '1';
    const LOCKED = '0';
    const PARENT_ID = null;

    public function content() {
        return $this->belongsTo(Content::class);
    }
    public function scopeActive($q)
    {
        return $q->where('state', Bank::ACTIVE);
    }

    public function scopeOnlyModules($q,$id)
    {
        return $q->join('contents','contents.id','=','banks.content_id')
        ->where('contents.course_id','=',$id);

    }
    public function scopeMyModule($q,$module)
    {
        if(!$module->id==null){

            return $q->where('content_id',$module->id);
        }else{
            return null;
        }
    }
    public function scopeOnlyQuestion($q)
    {
        return $q->where('banks.parent_id','=',null)
        ->orderby('banks.created_at');

    }
    public function CreateBank($request,$bank){

        $fields = $request->validated();
        //crear la pregunta
        $bank=Bank::create($request->except(['title2','is_correct']));


        foreach($fields['title2'] as $field){

                $fields=Arr::except($_POST, 'title2');
                $fields['title']=$field;
                $fields['parent_id']=$bank->id;
                $fields['is_question']=0;
        }
        foreach($fields['is_correct'] as $is_correct){
            $fields['is_correct']=$is_correct;
            $bank=Bank::create($fields);
        }
    }
    public function CreateOption($fields,Bank $bank){

        foreach($fields['is_correct'] as $field){
            $fields['is_correct']=$field;
        }

        foreach($fields['title'] as $field ){
            $fields['title']=$field;

            $bank::create($fields);
        }
    }
    public function parent()
    {
        return $this->belongsTo(Bank::class,'parent_id');
    }
    public function childs() {
        return $this->hasmany(Bank::class,'parent_id');
    }

    public function Eliminate($id)
    {
        $bank=Bank::findOrFail($id)->update(['state'=> '0']);

        return $this->state = Bank::LOCKED;
    }

    public function getActive() {
        return $this->active()->get();
    }

    public function isActive() {
        return $this->state = Bank::ACTIVE;
    }


}
