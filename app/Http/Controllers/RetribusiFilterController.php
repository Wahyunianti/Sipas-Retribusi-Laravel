<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Response;
use App\Repositories\RetribusiRepository;
use App\Models\Retribusi;
use App\Models\DataPasar;
use App\Models\Bagian;
use DataTables;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Carbon;


class RetribusiFilterController extends Controller
{

    public function __construct(
        private RetribusiRepository $retribusiRepository
    ) {
    }

    public function __invoke(): View|RedirectResponse
    {
        
        $dataPasar = DataPasar::select('id', 'nama_pasar')->orderBy('nama_pasar')->get();
        $bagian = Bagian::select('id', 'nama_bagian')->orderBy('nama_bagian')->get();
        $filteredResult = [];

        $start_date = request()->get('start_date');
        $end_date = request()->get('end_date');
        $psr = intval(request()->input('psr'));
        $bgn = intval(request()->input('bgn'));
              
        if (request()->has('start_date') && request()->has('end_date') && request()->has('psr') && request()->has('bgn')) {            
    
            $start_date = date('Y-m-d', strtotime(request()->input('start_date')));
            $end_date = date('Y-m-d', strtotime(request()->input('end_date')));
        
            
            if (request()->has('psr')) {
                $psr = intval(request()->input('psr'));
            } else {                
                $psr = 0;
            }
        
            if (request()->has('bgn')) {
                $bgn = intval(request()->input('bgn'));
            } else {
                $bgn = 0; 
            }

            if ($start_date === null || $end_date === null  || $psr === null || $bgn === null) {
                return redirect()->back()->with('warning', 'Tanggal awal atau tanggal akhir tidak boleh kosong!');
            }

            $filteredResult = $this->retribusiRepository->Filter($start_date, $end_date, $psr, $bgn);

        } 
        

        return view('menu.retribusi.retribusi', [
            'dataPasar' => $dataPasar,
            'bagian' => $bagian,
            'filteredResult' => $filteredResult
        ]);
    }
}

?>