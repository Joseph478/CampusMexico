<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourseContentRequest extends FormRequest
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
        $rules = [];
        $rules['name'] = 'required';

        if ($this->type->id == '1') {
            $rules['order'] = 'required|integer';
            $rules['description'] = 'required';
        }
        if ($this->type->id == '5') {
            $rules['content_link'] = 'nullable';
        }
        if ($this->type->id != '1' && $this->type->id != '5') {
            $rules['content_link'] = 'sometimes|nullable';
            $rules['attachment'] = 'sometimes|required|file';
        }

        return $rules;
    }
}
