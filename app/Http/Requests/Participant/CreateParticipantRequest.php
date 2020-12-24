<?php

namespace App\Http\Requests\Participant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CreateParticipantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    public function rules() : array
    {
        return [
            'dni' => [
                'required', 'alpha_num', 'min:8', 'max:10',
                Rule::unique('users')->ignore($this->id)
            ],
            'name' => ['required', 'string', 'max:70'],
            'last_name' => ['required', 'string', 'max:90'],
            'area' => ['present', 'max:70'],
            'position' => ['present', 'max:70'],
            'email' => [
                'required','email', 'max:255',
                Rule::unique('users')->ignore($this->id)
            ],
            'phone' => ['present', 'max:14'],
            'avatar'=>'mimes:jpeg,png,jpg,JPEG,PNG,JPG',
            'password' => ['confirmed'],
            //'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
    public function messages()
    {
        return [

            'avatar.mimes'=>'Formato de la imagen no aceptada',

        ];
    }


}
