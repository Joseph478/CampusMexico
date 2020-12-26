<?php

namespace App\Exports;

use App\Classroom;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ConsolidatedExport implements FromCollection, WithHeadings,
    ShouldAutoSize,
    WithMapping,
    WithColumnFormatting, WithStrictNullComparison,
    WithStyles
{
    protected $classroom;

    public function __construct(Classroom $classroom)
    {
        $this->classroom = $classroom;
    }

    /**
    * @return Classroom|\Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->classroom->scheduledParticipants;
    }

    public function headings(): array
    {
        return [
            'DNI',
            'PARTICIPANTE',
            'AREA',
            'PUESTO',
            'ASISTENCIA',
            'NOTA INICIO',
            'NOTA FINAL',
        ];
    }

    public function map($participant): array
    {
        return [
            $participant->dni,
            $participant->full_name,
            $participant->area,
            $participant->position,
            $participant->pivot->asistance,
            $participant->pivot->grade_begin,
            $participant->pivot->grade
        ];

    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT,
            'B' => NumberFormat::FORMAT_TEXT,
            'C' => NumberFormat::FORMAT_GENERAL,
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
                    'argb' => '96002D',
                ],
            ],
        ];
        return [
            // Style the first row as bold text.
            1 => $styleArray,
        ];
    }

}
