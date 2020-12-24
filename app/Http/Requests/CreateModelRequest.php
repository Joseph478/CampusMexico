<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateModelRequest extends FormRequest
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
            'name'=> 'required',
            'course_id' => 'nullable',
            'description' => 'required|min:15',

    ];
        }
        public function messages()
        {
            return [
                'name.required'=>'Nombre es un campo requerido',
                'description.required'=>'Descripcion es un campo requerido',
                'description.min'=>'Cantidad minima: 15 letras',

                ];
            }
}
