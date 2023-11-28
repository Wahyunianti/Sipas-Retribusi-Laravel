<?php

namespace App\Repositories;

use App\Contracts\ExportInterface;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;


class LaporanRepository implements ExportInterface
{
    public static function setStyle(): array
    {
        return [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN
                ]
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'font' => [
                'size' => 9,
                'name' => 'Arial',
            ]
        ];
    }


    public static function setWarna(): array
{
    return [
        
        'fill' => [
            'fillType' => Fill::FILL_SOLID, 
            'color' => ['argb' => 'BFBFBF'], 
        ]
    ];
}

    public static function outputTheExcel(object $spreadsheet, string $fileName): void
    {
        $writer = new Xlsx($spreadsheet);

        ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . date('dmY_His') . '".xlsx');
        $writer->save('php://output');
        exit();
    }
}
