<?php

namespace App\Http\Requests\Inscription;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class RegisterInscriptionRequest extends FormRequest
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
            'participants' => [
                'required',
                'array',
                function ($attribute, $value, $fail) {
                    $vacancies = $this->classroom->vacancies;
                    if (count($value) > $vacancies) {
                        $message = $vacancies.' ' .Str::plural('vacante', $vacancies).' '.Str::plural('disponible', $vacancies);
                        $fail($attribute.' solo hay '.$message);
                    }
            }]
        ];
    }
}
