<?php

namespace App\Imports;

use App\Models\Retribusi;
use App\Models\DataPasar;
use App\Models\Bagian;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class csvImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        $namaPasar = $row['nama_pasar'];
        $dataPasar = DataPasar::where('nama_pasar', $namaPasar)->first();
        $namaBagian = $row['nama_bagian'];
        $bagian = Bagian::where('nama_bagian', $namaBagian)->first();

        if (!$dataPasar || !$bagian) {
            return null;
        }

        $tanggal = $this->parseDate($row['tanggal']);

        return new Retribusi([
            'tanggal'     => $tanggal,
            'data_pasar_id'    => $dataPasar->id, 
            'bagian_id'    => $bagian->id, 
            'jumlah'    => $row['jumlah'], 
        ]);
    }

    private function parseDate($date)
    {
        $parsedDate = Carbon::parse($date);
        
        if ($parsedDate && !$parsedDate->isLastDecade()) {
            return $parsedDate;
        }

        $parsedDate = Carbon::createFromFormat('d/m/Y', $date);

        if ($parsedDate) {
            return $parsedDate;
        }

        return null;
    }

}
