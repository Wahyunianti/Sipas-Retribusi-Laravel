<?php

namespace App\Http\Controllers;

use App\Exports\ProductStyleExport;
use App\Imports\csvImport;
use App\Models\Retribusi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class CSVimpController extends Controller
{

    public function __invoke(): View|RedirectResponse
    {
          return view('menu.kelolaretribusi.kelola');
    }

    public function import(){
        Excel::import(new csvImport, request()->file('file'));

        return back();
    }

}