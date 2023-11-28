<?php

namespace App\Repositories;

use App\Contracts\ChartInterface;
use App\Http\Controllers\Controller;
use App\Models\Retribusi;

class ChartRepository extends Controller implements ChartInterface
{
    public function __construct(
        private Retribusi $model,
    ) {
    }

    public function sumRetribusiPerBulan(): array
    {
        $months = ['jan', 'feb', 'mar', 'apr', 'mei', 'jun', 'jul', 'agu', 'sep', 'okt', 'nov', 'des'];

        for ($i = 1; $i <= 12; $i++) {

            $retribusi = $this->model
                ->select('jumlah', 'tanggal')
                ->whereMonth('tanggal', "{$i}")
                ->whereYear('tanggal', date('Y'))
                ->sum('jumlah');

            $results[$months[$i - 1]] = $retribusi;
        }

        return $results;
    }
}
