<?php

namespace App\Http\Requests\Certificate;

use Illuminate\Foundation\Http\FormRequest;

class CreateCertificateRequest extends FormRequest
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
            'template'=>'required|mimes:jpeg,png,jpg,JPEG,PNG,JPG',
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'el nombre es requerido2',
            'template.required'=>'La imagen modelo es requerido',
            'template.mimes'=>'formato no aceptado'
        ];
    }
}
