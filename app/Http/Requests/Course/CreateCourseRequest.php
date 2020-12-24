<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourseRequest extends FormRequest
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
            
            'name' => 'required',
            'hour' => 'required|numeric',
            'category_id' => 'nullable',
            'company_id' => 'present',
            'description' => 'required|min:10|max:255',
            'temary' => 'required|min:10',
            'grade_min' => 'required|numeric|between:12.0,20.0',
            'is_certificate' =>'nullable',
            'image'=>'required|mimes:jpeg,png,jpg,JPEG,PNG,JPG',
            'validity'=>'required|numeric',
            'type_validity'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'description.required' => 'La descripción es requerida',
            'category_id.required' => 'La categoria es obligatoria',
            'hour.required' => 'La hora dictadas es requerida',
            'hour.numeric' => 'La hora debe ser numerica',
            'grade_min.required' => 'La nota minima es requerido',
            'grade_min.numeric' => 'La nota minima debe ser un numero',
            'image.required'=>'La Imagen es requerida',
            'image.mimes'=>'Formato no aceptado para una imagen',
            'validity'=>'Ingrese un tiempo valido'
        ];
    }
}
