<?php

namespace App\Exports;

use DB;
use App\User;
use App\Inscription;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\FromQuery;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;


class ReportsExport implements
    FromQuery, WithHeadings,
    ShouldAutoSize, WithMapping,
    WithColumnFormatting, WithStrictNullComparison,
    WithStyles
{
    protected $start;
    protected $end;
    protected $course_id;

    public function __construct(string $start, string $end, int $course_id)
    {
        $this->start = $start;
        $this->end = $end;
        $this->course_id = $course_id;
    }

    public function query()
    {
        //sleccionamos el ffiltro para poder editar
        $date_start=Carbon::parse($this->start)->format('Y-m-d H:i:s');
        $date_end=Carbon::parse($this->end)->format('Y-m-d H:i:s');

        $inscription=Inscription::query()
        ->whereHas('classroom')
        ->whereNotIn('id', [8061,8063,8063,8067,8062,8064,8066,8068])
        ->whereNotNull('grade_date')
        ->get();

        //editamos si el campos updated_at es diferente a inscription->last_date
        foreach($inscription as $inscriptions)
        {
            Inscription::where('id',$inscriptions->id)
                        ->where('updated_at', '!=' ,$inscriptions->last_date)
                        ->update(['updated_at' => $inscriptions->last_date]);
        }
        //returnamos con los filtros
        return Inscription::query()
        ->whereHas('classroom', function ($query) {
            $query->when($this->course_id  > 0, function ($q) {
                return $q->where('course_id', $this->course_id)
                ->whereNotIn('course_id',[1,2,3,4]);
            });
        })
        ->whereDate('updated_at','>=',$date_start)
        ->whereDate('updated_at','<=',$date_end)
        ->whereNotIn('id', [8061,8063,8063,8067,8062,8064,8066,8068])
        ->whereNotIn('user_id', [5747,5251,5238,5746])
        ->active()
        ->whereNotNull('grade_date');
    }

    public function map($inscription): array
    {

        $count = 0;
        $count_date = 0;
        $array_tried = [];

        if (is_array($inscription->grade_date)) {
            $count =  count($inscription->grade_tried);

            for ($i = 0; $i < $count; $i++) {

                array_push($array_tried, $inscription->grade_tried[$i]);
                array_push($array_tried, $inscription->grade_date[$i]);

            }
            if ($count == 1) {
                array_push($array_tried, null);
                array_push($array_tried, null);

            }
        } else {
            $array_tried = [null, null, null, null,];
        }

        $dato1 = [
            Date::dateTimeToExcel($inscription->created_at),
            $inscription->classroom->name,
            $inscription->participant->dni,
            $inscription->participant->last_name,
            $inscription->participant->name,
            $inscription->first_access,
            $inscription->grade_begin,
            $inscription->grade_begin_date,
        ];
        $dato3 = [
            $inscription->grade,
        ];


        $result = array_merge($dato1,$array_tried,$dato3);

        return $result;
    }
    public function headings(): array
    {
        return [
            'FECHA', 'CURSO',
            'DNI', 'APELLIDOS', 'NOMBRES',
            'FECHA DE INGRESO',
            'NOTA INICIO',
            'FECHA DE EXAMEN DE INICIO',
            'PRIMER INTENTO 1',
            'FECHA 1',
            'SEGUNDO INTENTO 2',
            'FECHA 2',
            'NOTA FINAL'
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_DATE_DATETIME,
            'C' => NumberFormat::FORMAT_TEXT,
            'F' => NumberFormat::FORMAT_DATE_DATETIME,
            'G' => NumberFormat::FORMAT_TEXT,
            'H' => NumberFormat::FORMAT_DATE_DATETIME,
            'I' => NumberFormat::FORMAT_GENERAL,
            'M' => NumberFormat::FORMAT_NUMBER,
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
            1 => $styleArray,
        ];
    }
}
