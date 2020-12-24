<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTestRequest extends FormRequest
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

    protected function prepareForValidation() : void
    {
        $this->merge([
            'time' => gmdate("H:i:s", $this->time*60),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'classroom_id'=>'required',
            'name'=>'required|min:3|max:200',
            'random'=>'nullable',
            'time'=>'required|date_format:H:i:s',
            'tried'=>'required',
            'save_tried'=>'required',
            'view_answer'=>'nullable',
            'start_date'=>'required',
            'end_date'=>'required',
            'number_question'=>'required',
            'grade_max'=>'required',
            'is_qualified'=>'nullable',
            'type'=>'nullable',
            'state'=>'nullable',
        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'el nombre es requerido',
            'name.min'=>'El nombre debe tener minimo 3 caracteres',
            'name.max'=>'El nombre debe tener maxima 200 caracteres',
            'start_date.required' =>'La Fecha de inicio es requerida',
            'end_date.required' =>'La Fecha de termino es requerida',
            'tried.required' =>'La cantidad de intentos es requerida',
            'grade_max.required' =>'La nota maxima es requerida',
            'time.required' =>'El tiempo es requerida',
            'number_question.required' =>'El numero de preguntas es requerida',
        ];
    }
}
