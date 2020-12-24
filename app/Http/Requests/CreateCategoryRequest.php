<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return [
            
            'name' => 'required',
            'description' => 'required|min:10|max:255',
            'state'=>'nullable'

        
    ];
    }
    public function messages()
    {
        return [
            
                'name.required' => 'El nombre es Requerido',
                'description.required' => 'La descripcion es requerida',
            
        ];
    }
}
