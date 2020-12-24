<?php

namespace App\Imports;

use App\User;
use App\Classroom;
use App\Inscription;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InscriptionImport implements WithHeadingRow,ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        $contrata = Auth::user();
        $classroom = Classroom::get()->modelKeys();
        $user = User::where('dni',trim($row['dni']))->first();


            $inscription = Inscription::create([

                'classroom_id' => $row['programacion'],
                'user_id' => $user->id,
                'first_access'=> null,
                'assistance'=> null,
                'grade_begin'=>null,
                'grade_begin_date'=>null,
                'grade'=>null,
                'grade_tried'=>null,
                'grade_date'=>null,
                'user_created'=>$contrata->id,
                'grade_min' => 16,
                'type' => $row['tipo'],
            ]);
    }


}
