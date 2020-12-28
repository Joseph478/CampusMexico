<?php

namespace App\Imports;

use App\Classroom;
use App\Inscription;
use App\User;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ConsolidatedInscriptionImport implements
    ToCollection,
    WithValidation,
    WithHeadingRow
{
    protected $classroom;

    public function __construct(Classroom $classroom)
    {
        $this->classroom = $classroom;
    }

    /**
    * @param Collection $rows
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $user = User::firstWhere('dni', '=', $row['dni']);
            $inscription = Inscription::Where('user_id', $user->id)->where('classroom_id', $this->classroom->id)->first();
            if ($inscription->assistance === null) {
                $inscription->assistance = $row['asistencia'];
                $inscription->save();
            }
            if ($inscription->assistance !== $row['asistencia']) {
                $inscription->assistance = $row['asistencia'];
                $inscription->save();
            }
        }
    }

    public function rules(): array
    {
        return [
             '*.asistencia' => Rule::in(['A', 'F']),
        ];
    }
}
