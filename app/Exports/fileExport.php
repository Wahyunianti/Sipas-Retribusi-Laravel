<?php

namespace App\Exports;

use App\Models\Retribusi;
use Maatwebsite\Excel\Concerns\FromCollection;

class fileExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Retribusi::all();
    }
}
