<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\DataPasar;
use App\Models\Bagian;
use App\Repositories\RetribusiRepository;

class DashboardController extends Controller
{
    public function __construct(
        private RetribusiRepository $retribusiRepository,
    ) {
    }

    public function __invoke(): View
    {
        $ctRet = indonesianCurrency($this->retribusiRepository->sumJumlah());
        

        return view('menu.dashboard.index', [
            'ctPasar' => DataPasar::count(),
            'ctBagian' => Bagian::count(),
            'ctRet' => $ctRet,
        ]);

    }
}
