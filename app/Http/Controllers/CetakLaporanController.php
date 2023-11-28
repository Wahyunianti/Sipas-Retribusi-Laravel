<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Models\Retribusi;
use App\Models\DataPasar;
use App\Models\Bagian;


class cetakLaporanController extends Controller
{
    public function __invoke(): View|RedirectResponse
    {
        $bulan = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        ];

        $dataPasar = DataPasar::select('id', 'nama_pasar')->orderBy('nama_pasar')->get();
        $bagian = Bagian::select('id', 'nama_bagian')->orderBy('nama_bagian')->get();
        
        return view('menu.cetak.index', [
            'bagian' => $bagian,
            'bulan' => $bulan,
        ]);
    }
}
