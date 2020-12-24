<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourseTestRequest extends FormRequest
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
            'inputs' => [
                'required',
                'array',

            ],
            'date' => [
                    'required',
            ]];
    }
    public function messages()
    {
        return [
            'inputs.required' => 'Responda las preguntas',

        ];
    }
}
