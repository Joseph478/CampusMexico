<?php

namespace App\Imports;

use App\Company;
use App\User;
use Auth;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Throwable;

class ParticipantImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnError
{

    use Importable, SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function rules(): array
    {

        return [
            // Siempre valida por lotes
            // Fila.columna
            '*.ruc' =>  'required|max:11|min:11',
            '*.dni' => 'required|max:8|min:8',
            '*.email' => 'nullable'

        ];
    }
    public function customValidationMessages()
    {
        return[
            'ruc.required'=>'El RUC es requerido',
            'dni.required'=>'El DNI es requerido',
            'ruc.min'=>'El ruc debe tener 11 digitos',
            'ruc.max'=>'El ruc debe tener 11 digitos',
            'dni.max'=>'El dni debe tener 8 digitos',
            'dni.max'=>'El dni debe tener 8 digitos',
        ];
    }

    public function model(array $row)
    {

        $company = Company::where('ruc', trim($row['ruc']))->first();

        $participant = User::where('dni',trim($row['dni']))->role('participante')->first();
        $contrata =Auth::user();
        $email=$row['email'];
        if($email== null or $email == ' ')
        {
            $email=$row['dni'].'@gmail.com';
        }
        if($participant)
        {
            $participant->update([
                'dni' => $participant->dni,
                'last_name' => $row['apellidos'],
                'name' => $row['nombres'],
                'area' => $row['area'],
                'position' => $row['puesto'],
                'ruc' => $row['ruc'],
                'company_id' => $company->id,
                'phone' => $row['telefono'],
                'user_created' => $contrata,
                'user_modified' => $contrata,
                'password'=>bcrypt($row['dni'])
            ]);
        }else{
            $participant=User::create([
                'dni' => $row['dni'],
                'last_name' => $row['apellidos'],
                'name' => $row['nombres'],
                'area' => $row['area'],
                'position' => $row['puesto'],
                'ruc' => $row['ruc'],
                'company_id' => $company->id,
                'email' =>$email,
                'phone' => $row['telefono'],
                'user_created' => $contrata,
                'user_modified' => $contrata,
                'password'=>bcrypt($row['dni'])
            ]);
        }
        $participant->assignRole('participante');

    }
    public function onError(Throwable $error)
    {

    }
}
