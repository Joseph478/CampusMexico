<?php

namespace App\Http\Requests\Contractor;

use Illuminate\Foundation\Http\FormRequest;

class StoreContractorRequest extends FormRequest
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
            'dni1' => ['required', 'alpha_num', 'min:8'],
            'name1' => ['required', 'string', 'max:70'],
            'last_name1' => ['present', 'string', 'max:70'],
            'email1' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone1' => ['required', 'string', 'min:8'],
            'password1' => ['required', 'string', 'min:8', 'confirmed'],
            'ruc1' => ['required', 'string', 'min:11', 'max:11'],
            'name_company' => ['required', 'string', 'min:5'],
        ];
    }
//
//    public function messages()
//    {
//
//    }
}
