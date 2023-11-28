<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasarStoreRequest;
use App\Http\Requests\PasarUpdateRequest;
use App\Models\DataPasar;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PasarKelolaController extends Controller
{
    
    public function index(): View|JsonResponse
    {
        $pasar = DataPasar::select('id', 'nama_pasar')->orderBy('nama_pasar')->get();

        if (request()->ajax()) {
            return datatables()->of($pasar)
                ->addIndexColumn()
                ->addColumn('action', 'menu.kelolapasar.datatable.action')
                ->rawColumns(['action'])
                ->toJson();
        }

   
        return view('menu.kelolapasar.index');
    }

    public function store(PasarStoreRequest $request): RedirectResponse
    {
        DataPasar::create($request->validated());

        return redirect()->route('pasar.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function update(PasarUpdateRequest $request, DataPasar $pasar): RedirectResponse
    {
        $pasar->update($request->validated());

        return redirect()->route('pasar.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(DataPasar $pasar): RedirectResponse
    {
        if ($pasar->retribusi()->exists()) {
            return redirect()->route('pasar.index')->with('warning', 'Data yang memiliki relasi tidak dapat dihapus!');
        }

        $pasar->delete();

        return redirect()->route('pasar.index')->with('success', 'Data berhasil dihapus!');
    }
}
