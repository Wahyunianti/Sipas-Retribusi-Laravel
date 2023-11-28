<?php

namespace App\Repositories;

use App\Contracts\RetribusiInterface;
use App\Http\Controllers\Controller;
use App\Models\Retribusi;
use App\Models\DataPasar;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class RetribusiRepository extends Controller implements RetribusiInterface
{
    public function __construct(
        private Retribusi $model
    ) {
    }

    public function sumJumlah()
    {
        return Retribusi::sum('jumlah');
    }


    public function Filter( string $start, string $end, int $pasar, int $bagian): array
    {
        $filteredResult = [];

        $start_date = date('Y-m-d', strtotime($start));
        $end_date = date('Y-m-d', strtotime($end));
        $pasarr= intval($pasar);
        $bagiann= intval($bagian);
        $awalTahun = date('Y-01-01');  
        $bulan = date('m', strtotime($start_date));
        $bulanSb = $bulan-1;
        

       

        $retribusiQuery = $this->model
        ->select('tanggal', 'data_pasar_id', 'bagian_id', 'jumlah')
        ->with('data_pasar:id,nama_pasar', 'bagian:id,nama_bagian')
        ->where('data_pasar_id', $pasarr)
        ->where('bagian_id', $bagiann)
        ->whereBetween('tanggal', [$start_date, $end_date])
        ->orderBy('tanggal');

        $retribusi = $retribusiQuery->get();

      

        $namaPasar = Retribusi::select('data_pasar.nama_pasar')
        ->join('data_pasar', 'retribusi.data_pasar_id', '=', 'data_pasar.id')
        ->where('retribusi.data_pasar_id', $pasarr)
        ->distinct('retribusi.data_pasar_id')
        ->pluck('nama_pasar')
        ->first();

        $namaBagian = Retribusi::select('bagian.nama_bagian')
        ->join('bagian', 'retribusi.bagian_id', '=', 'bagian.id')
        ->where('retribusi.bagian_id', $bagiann)
        ->distinct('retribusi.bagian_id')
        ->pluck('nama_bagian')
        ->first();

        $results = $this->model
        ->select('tanggal', 'data_pasar_id', 'bagian_id', 'jumlah')
        ->with('data_pasar:id,nama_pasar', 'bagian:id,nama_bagian')
        ->where('data_pasar_id', $pasarr)
        ->where('bagian_id', $bagiann)
        ->whereBetween('tanggal', [$awalTahun, $end_date])
        ->get();

        $resultss = $this->model
        ->select('tanggal', 'data_pasar_id', 'bagian_id', 'jumlah')
        ->with('data_pasar:id,nama_pasar', 'bagian:id,nama_bagian')
        ->where('data_pasar_id', $pasarr)
        ->where('bagian_id', $bagiann)
        ->whereMonth('tanggal', $bulanSb)
        ->get();

        if ($retribusi === null || $retribusi->isEmpty()) {
            session()->flash('warning', 'Data tidak ada atau kosong!');
            return $filteredResult;          
        } 

        $filteredResult['retribusi'] = $retribusi;
        $filteredResult['sumJumlah'] = $retribusi->sum('jumlah');
        $filteredResult['spJumlah'] = $results->sum('jumlah');
        $filteredResult['blJumlah'] = $resultss->sum('jumlah');
        $filteredResult['meanJumlah'] = $retribusi->avg('jumlah');
        $filteredResult['minimumJumlah'] = $retribusi->min('jumlah');
        $filteredResult['maksimumJumlah'] = $retribusi->max('jumlah');
        $filteredResult['start_date'] = date('Y-m-d', strtotime($start_date));
        $filteredResult['end_date'] = date('Y-m-d', strtotime($end_date));
        $filteredResult['namaPasar'] = $namaPasar;
        $filteredResult['namaBagian'] = $namaBagian;
    
        return $filteredResult;
    }

   
}
