<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'course_id' => 'required',
            'description' => 'required|min:10|max:255',
            'type_id' => 'required',
            'attachment' => 'nullable',
            'parent_id' => 'nullable',
            'reply' => 'nullable',
            'order'=>'nullable',


    ];
        }
        public function messages()
        {
            return [


                ];
            }
}
