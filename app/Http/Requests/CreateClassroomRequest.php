<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClassroomRequest extends FormRequest
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
            'user_id' => 'required',
            'type' => 'required',
            'start_datetime' => 'required|date_format:d/m/Y',
            'end_datetime' => 'required|date_format:d/m/Y',
            'name' => 'nullable',
            'hour'=>'nullable',
            'grade_min' =>'nullable',
            'is_free'=>'nullable',
            'is_certificate'=>'nullable',
            'validity'=>'nullable',
            'type_validity'=>'nullable',
            'state'=>'nullable',
            'platform'=>'required',
            'platform_id'=>'required',
            'platform_password'=>'required',
            'platform_url'=>'required',

    ];
        }
        public function messages()
        {
            return [


                ];
            }
        }
