<?php

namespace App\Http\Controllers\Export;

use App\Contracts\ExcelExportInterface;
use App\Http\Controllers\Controller;
use App\Models\Retribusi;
use App\Models\DataPasar;
use App\Models\Bagian;
use App\Repositories\LaporanRepository;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Style;
use Illuminate\Support\Facades\DB;

class LaporanRetribusiController extends Controller implements ExcelExportInterface
{
    const FILE_NAME = 'laporan-retribusi';

    public function __invoke()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $this->setExcelHeader($spreadsheet);

        $bln = intval(request()->input('bln'));
        $bgn = intval(request()->input('bgn'));
        $sbl = $bln-1;

        $results = DataPasar::join('retribusi as rb', 'data_pasar.id', '=', 'rb.data_pasar_id')
        ->join('bagian as bg', 'bg.id', '=', 'rb.bagian_id')
        ->select(
            'data_pasar.nama_pasar AS Pasar',
            'bg.nama_bagian AS Bagian',
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 1), 0) AS tgl1'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 2), 0) AS tgl2'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 3), 0) AS tgl3'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 4), 0) AS tgl4'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 5), 0) AS tgl5'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 6), 0) AS tgl6'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 7), 0) AS tgl7'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 8), 0) AS tgl8'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 9), 0) AS tgl9'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 10), 0) AS tgl10'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 11), 0) AS tgl11'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 12), 0) AS tgl12'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 13), 0) AS tgl13'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 14), 0) AS tgl14'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 15), 0) AS tgl15'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 16), 0) AS tgl16'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 17), 0) AS tgl17'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 18), 0) AS tgl18'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 19), 0) AS tgl19'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 20), 0) AS tgl20'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 21), 0) AS tgl21'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 22), 0) AS tgl22'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 23), 0) AS tgl23'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 24), 0) AS tgl24'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 25), 0) AS tgl25'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 26), 0) AS tgl26'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 27), 0) AS tgl27'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 28), 0) AS tgl28'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 29), 0) AS tgl29'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 30), 0) AS tgl30'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.' AND DAY(k.tanggal) = 31), 0) AS tgl31'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.'), 0) AS Jumlah'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) >= 1 AND MONTH(k.tanggal) <= '.$bln.'), 0) AS Jumlah_sd_saat_ini'),
            DB::raw('COALESCE((SELECT SUM(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$sbl.'), 0) AS Jumlah_bulan_lalu'),
            DB::raw('COALESCE((SELECT AVG(k.jumlah) FROM retribusi k WHERE data_pasar.id = k.data_pasar_id AND k.bagian_id = bg.id AND MONTH(k.tanggal) = '.$bln.'), 0) AS Rerata'),
            DB::raw("CASE
                WHEN ".$bln." = 1 THEN 'Januari'
                WHEN ".$bln." = 2 THEN 'Februari'
                WHEN ".$bln." = 3 THEN 'Maret'
                WHEN ".$bln." = 4 THEN 'April'
                WHEN ".$bln." = 5 THEN 'Mei'
                WHEN ".$bln." = 6 THEN 'Juni'
                WHEN ".$bln." = 7 THEN 'Juli'
                WHEN ".$bln." = 8 THEN 'Agustus'
                WHEN ".$bln." = 9 THEN 'September'
                WHEN ".$bln." = 10 THEN 'Oktober'
                WHEN ".$bln." = 11 THEN 'November'
                WHEN ".$bln." = 12 THEN 'Desember'
                ELSE 'Tidak Valid'
            END AS Bulan")
        )
        ->where('bg.id', '=', $bgn)
        ->groupBy('data_pasar.id', 'bg.id', 'data_pasar.nama_pasar', 'bg.nama_bagian', 'Bulan')
        ->get();
    


        $this->setExcelContent($results, $sheet);

        LaporanRepository::outputTheExcel($spreadsheet, self::FILE_NAME);
    }

    public function setExcelHeader(Spreadsheet $spreadsheet): Worksheet
    {
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->mergeCells('A1:A2');
        $sheet->mergeCells('B1:B2');
        $sheet->mergeCells('C1:C2');
        $sheet->mergeCells('D1:AH1');
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'UNIT PASAR');
        $sheet->setCellValue('C1', 'BULAN LALU');
        $sheet->setCellValue('D1', 'TANGGAL');
        $sheet->setCellValue('D2', '1');
        $sheet->setCellValue('E2', '2');
        $sheet->setCellValue('F2', '3');
        $sheet->setCellValue('G2', '4');
        $sheet->setCellValue('H2', '5');
        $sheet->setCellValue('I2', '6');
        $sheet->setCellValue('J2', '7');   
        $sheet->setCellValue('K2', '8');     
        $sheet->setCellValue('L2', '9');     
        $sheet->setCellValue('M2', '10');     
        $sheet->setCellValue('N2', '11');     
        $sheet->setCellValue('O2', '12');     
        $sheet->setCellValue('P2', '13');     
        $sheet->setCellValue('Q2', '14');     
        $sheet->setCellValue('R2', '15');     
        $sheet->setCellValue('S2', '16');     
        $sheet->setCellValue('T2', '17');     
        $sheet->setCellValue('U2', '18');     
        $sheet->setCellValue('V2', '19');     
        $sheet->setCellValue('W2', '20');     
        $sheet->setCellValue('X2', '21');     
        $sheet->setCellValue('Y2', '22');     
        $sheet->setCellValue('Z2', '23');     
        $sheet->setCellValue('AA2', '24');     
        $sheet->setCellValue('AB2', '25');     
        $sheet->setCellValue('AC2', '26');     
        $sheet->setCellValue('AD2', '27');     
        $sheet->setCellValue('AE2', '28');     
        $sheet->setCellValue('AF2', '29');     
        $sheet->setCellValue('AG2', '30');     
        $sheet->setCellValue('AH2', '31');  
        $sheet->mergeCells('AI1:AI2');
        $sheet->mergeCells('AJ1:AJ2');
        $sheet->mergeCells('AK1:AK2');
        $sheet->mergeCells('AL1:AL2');
        $sheet->mergeCells('AM1:AM2');
        $sheet->setCellValue('AI1', 'bulan ini');
        $sheet->setCellValue('AJ1', 's/d bulan ini');


        foreach (range('A1', 'AJ1') as $paragraph) {
            $sheet->getColumnDimension($paragraph)->setAutoSize(true);
        }

        return $sheet;
    }

    public function setExcelContent($results, Worksheet $sheet): Worksheet
    {
        $cell = 3;
        foreach ($results as $key => $row) {
            $sheet->setCellValue('A' . $cell, $key + 1);
            $sheet->setCellValue('B' . $cell, $row->Pasar);
            $sheet->setCellValue('C' . $cell, $row->Jumlah_bulan_lalu);
            $sheet->setCellValue('D' . $cell, $row->tgl1);
            $sheet->setCellValue('E' . $cell, $row->tgl2);
            $sheet->setCellValue('F' . $cell, $row->tgl3);
            $sheet->setCellValue('G' . $cell, $row->tgl4);
            $sheet->setCellValue('H' . $cell, $row->tgl5);
            $sheet->setCellValue('I' . $cell, $row->tgl6);
            $sheet->setCellValue('J' . $cell, $row->tgl7);
            $sheet->setCellValue('K' . $cell, $row->tgl8);
            $sheet->setCellValue('L' . $cell, $row->tgl9);
            $sheet->setCellValue('M' . $cell, $row->tgl10);
            $sheet->setCellValue('N' . $cell, $row->tgl11);
            $sheet->setCellValue('O' . $cell, $row->tgl12);
            $sheet->setCellValue('P' . $cell, $row->tgl13);
            $sheet->setCellValue('Q' . $cell, $row->tgl14);
            $sheet->setCellValue('R' . $cell, $row->tgl15);
            $sheet->setCellValue('S' . $cell, $row->tgl16);
            $sheet->setCellValue('T' . $cell, $row->tgl17);
            $sheet->setCellValue('U' . $cell, $row->tgl18);
            $sheet->setCellValue('V' . $cell, $row->tgl19);
            $sheet->setCellValue('W' . $cell, $row->tgl20);
            $sheet->setCellValue('X' . $cell, $row->tgl21);
            $sheet->setCellValue('Y' . $cell, $row->tgl22);
            $sheet->setCellValue('Z' . $cell, $row->tgl23);
            $sheet->setCellValue('AA' . $cell, $row->tgl24);
            $sheet->setCellValue('AB' . $cell, $row->tgl25);
            $sheet->setCellValue('AC' . $cell, $row->tgl26);
            $sheet->setCellValue('AD' . $cell, $row->tgl27);
            $sheet->setCellValue('AE' . $cell, $row->tgl28);
            $sheet->setCellValue('AF' . $cell, $row->tgl29);
            $sheet->setCellValue('AG' . $cell, $row->tgl30);
            $sheet->setCellValue('AH' . $cell, $row->tgl31);
            $sheet->setCellValue('AI' . $cell, $row->Jumlah);
            $sheet->setCellValue('AJ' . $cell, $row->Jumlah_sd_saat_ini);
            $cell++;
            $sheet->getStyle('A1:AJ' . ($cell - 1))->applyFromArray(LaporanRepository::setStyle());
            $sheet->getStyle('A1:AJ2')->applyFromArray(LaporanRepository::setWarna());

        }
        return $sheet;
    }
}
