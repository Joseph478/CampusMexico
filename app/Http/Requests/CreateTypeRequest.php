<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTypeRequest extends FormRequest
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
            'name' =>'required',
            'description' =>'required|min:10|max:200'
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'el nombre es requerido2',
            'description.required' =>'La descripcion es requerida',
            'description.min'=>'La cantidad debe tener de 10 a mas caracteres',
            'description.max'=>'la cantidad maxima es de 200 caracteres',
        ];
    }
}
