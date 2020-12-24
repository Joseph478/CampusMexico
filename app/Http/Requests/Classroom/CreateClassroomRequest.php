<?php

namespace App\Http\Requests\Classroom;

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
//        dd($this->request);
        return [
            'course_id' => 'required',
            'user_id' => 'required',
            'type' => 'required',
            'start_datetime' => 'required|date_format:d-m-Y h:i A',
            'end_datetime' => 'required|date_format:d-m-Y',
            'vacancies' => ['required','integer'],
            'modality' => 'required',
            'is_free' => 'nullable',
            'test_begin_required' => 'nullable',

            'name' => 'nullable',
            'hour'=>'nullable',
            'grade_min' =>'nullable',
            'is_certificate'=>'nullable',
            'validity'=>'nullable',
            'type_validity'=>'nullable',

            'platform'=>'nullable',
            'platform_id'=>'nullable',
            'platform_password'=>'nullable',
            'platform_url'=>'nullable',
        ];
    }
}
