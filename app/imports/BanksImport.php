<?php

namespace App\Imports;

use App\Bank;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BanksImport implements ToModel, WithHeadingRow
{



    public function model(array $row)
    {
        $bank = Bank::create([

            'title' => $row['pregunta'],
            'is_correct' => $row['correcto'],
            'is_question' => $row['is_question'],
            'parent_id' => $parent_id=strval(Bank::where('is_question',1)->latest()->first()->id),
            'content_id' => 43
        ]);
        }
}
