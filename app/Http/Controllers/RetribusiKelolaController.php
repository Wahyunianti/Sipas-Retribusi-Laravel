<?php

namespace App\Http\Controllers;

use App\Http\Requests\RetribusiStoreRequest;
use App\Http\Requests\RetribusiUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\DataPasar;
use App\Models\Bagian;
use App\Models\Retribusi;
use App\Repositories\RetribusiRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Imports\csvImport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;


class RetribusiKelolaController extends Controller
{
    public function __construct(
        private RetribusiRepository $retribusiRepository,
    ) {
    }

    public function index(): View|JsonResponse
    {
        $retribusi = Retribusi::with('data_pasar:id,nama_pasar', 'bagian:id,nama_bagian')
            ->select('id','tanggal','data_pasar_id','bagian_id','jumlah')
            ->get();

        if (request()->ajax()) {
            return datatables()->of($retribusi)
                ->addIndexColumn()
                ->addColumn('tanggal', fn ($model) => date('d-m-Y', strtotime($model->tanggal)))
                ->addColumn('data_pasar_id', fn ($model) => $model->data_pasar->nama_pasar )
                ->addColumn('bagian_id', fn ($model) => $model->bagian->nama_bagian)
                ->addColumn('jumlah', fn ($model) => indonesianCurrency($model->jumlah))                
                ->addColumn('bagian_id', 'menu.kelolaretribusi.datatable.bagian')
                ->addColumn('action', 'menu.kelolaretribusi.datatable.action')
                ->rawColumns(['action', 'bagian_id'])
                ->toJson();
        }

        $dataPasar = DataPasar::select('id', 'nama_pasar')->orderBy('nama_pasar')->get();
        $bagian = Bagian::select('id', 'nama_bagian')->orderBy('nama_bagian')->get();

        $ctRet = indonesianCurrency($this->retribusiRepository->sumJumlah());
        $ctPasar = DataPasar::count();
        $ctBagian = Bagian::count();

        return view('menu.kelolaretribusi.kelola', [
            'dataPasar' => $dataPasar,
            'bagian' => $bagian,
            'ctPasar' => $ctPasar,
            'ctBagian' => $ctBagian,
            'ctRet' => $ctRet,
        ]);
    }

    public function store(RetribusiStoreRequest $request): RedirectResponse
    {
        
        $formattedDate = Carbon::createFromFormat('Y-m-d', $request->tanggal)->format('Y-m-d');

            Retribusi::create([
                'tanggal' => $formattedDate,
                'data_pasar_id' => $request->data_pasar_id,
                'bagian_id' => $request->bagian_id,
                'jumlah' => $request->jumlah
            ]);

        return redirect()->route('retribusis.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function update(RetribusiUpdateRequest $request, Retribusi $retribusi): RedirectResponse
    {
        $retribusi->update($request->validated());

        return redirect()->route('retribusis.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(Retribusi $retribusi): RedirectResponse
    {
        $retribusi->delete();

        return redirect()->route('retribusis.index')->with('success', 'Data berhasil dihapus!');
    }

}
