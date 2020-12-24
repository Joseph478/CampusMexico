<?php

namespace App\Exports;

use App\Bank;
use App\Test;
use App\TestUser;
use App\Inscription;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\FromQuery;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class ReportDetailGrade implements FromCollection, WithHeadings,
ShouldAutoSize, WithMapping,
WithColumnFormatting, WithStrictNullComparison,
WithStyles
{

    public function collection()
    {

        return TestUser::query()
        ->select('user_id', 'test_id', 'questions',
            'answers', 'correct_answers', 'grade'
        )
        ->with(['participant', 'test' => function ($query) {
            $query
                ->whereIn('classroom_id', [1, 2, 3, 4, 5, 6, 7 ,8])
                ->where('type', 0)
            ;
        }])
        ->whereHas('test', function ($query) {
            $query->whereIn('classroom_id', [1, 2, 3, 4, 5, 6 ,7 ,8])
            ->where('type', 0)
        ;
        })
            ->whereNotIn('user_id', [2, 5238])
            ->orderBy('user_id')
            ->orderBy( 'test_id')
            ->orderBy('grade', 'desc')
            ->get()->unique(function ($item) {
            return $item['user_id'].$item['test_id'];
        });
    }
    public function map($testuser): array
    {
            //$inscriptions=Inscription::where(['user_id'=>$testuser->user_id 'test_id'])->get();

            $header=[];

            $bank_answer=Bank::whereIn('id',$testuser->answers)->get();
            $bank_correct_answer=Bank::whereIn('id',$testuser->correct_answers)->get();
            $bank_questions=Bank::whereIn('id',$testuser->questions)->get();

            $count =  count($bank_questions);

            for ($i = 0; $i < $count; $i++) {

                array_push($header, $bank_questions[$i]->title,$bank_answer[$i]->title,$bank_correct_answer[$i]->title);

            }

        $data = [
            //Date::dateTimeToExcel($testuser->created_at),
            $testuser->test->classroom->name,
            $testuser->participant->dni,
            $testuser->participant->last_name,
            $testuser->participant->name,

            ];

        $data2 = [
            $testuser->grade
        ];

            $result = array_merge($data,$header,$data2);
        return $result;

    }
    public function headings(): array
    {
        return [
            'CURSO','DNI',
            'APELLIDOS', 'NOMBRES',
            'PREGUNTA 1',
            'OPCION MARCADA',
            'OPCION CORRECTA',
            'PREGUNTA 2',
            'OPCION MARCADA',
            'OPCION CORRECTA',
            'PREGUNTA 3',
            'OPCION MARCADA',
            'OPCION CORRECTA',
            'PREGUNTA 4',
            'OPCION MARCADA',
            'OPCION CORRECTA',
            'PREGUNTA 5',
            'OPCION MARCADA',
            'OPCION CORRECTA',
            'PREGUNTA 6',
            'OPCION MARCADA',
            'OPCION CORRECTA',
            'PREGUNTA 7',
            'OPCION MARCADA',
            'OPCION CORRECTA',
            'PREGUNTA 8',
            'OPCION MARCADA',
            'OPCION CORRECTA',
            'PREGUNTA 9',
            'OPCION MARCADA',
            'OPCION CORRECTA',
            'PREGUNTA 10',
            'OPCION MARCADA',
            'OPCION CORRECTA',
            'NOTA FINAL'
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT,
            'B' => NumberFormat::FORMAT_TEXT,
            'C' => NumberFormat::FORMAT_TEXT,
            'D' => NumberFormat::FORMAT_TEXT,
            'E' => NumberFormat::FORMAT_TEXT,
            'F' => NumberFormat::FORMAT_TEXT,
            'G' => NumberFormat::FORMAT_TEXT,

        ];
    }

    public function styles(Worksheet $sheet)
    {
        $styleArray = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],

            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => '33425E',
                ],
            ],
        ];
        return [
            // Style the first row as bold text.
            1 =>$styleArray,
        ];
    }
}
