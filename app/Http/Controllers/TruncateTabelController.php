<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Response;
use App\Repositories\RetribusiRepository;
use App\Models\Retribusi;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Carbon;


class TruncateTabelController extends Controller
{

    public function __invoke(): View|RedirectResponse
    {
          return view('menu.kelolaretribusi.kelola');
    }

    public function truncateTabel()
    {
            Retribusi::truncate();

           return redirect()->route('retribusis.index')->with('success', 'Data berhasil dikosongkan!');
     
    }

}