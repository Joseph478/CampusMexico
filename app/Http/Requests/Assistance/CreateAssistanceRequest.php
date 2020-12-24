<?php

namespace App\Http\Requests\Assistance;

use Illuminate\Foundation\Http\FormRequest;

class CreateAssistanceRequest extends FormRequest
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
            'assistance_date' => ['required', 'date_format:d-m-Y'],
            'is_virtual' => ['required', 'string', 'max:1'],
        ];
    }
}
