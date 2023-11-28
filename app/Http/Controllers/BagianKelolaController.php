<?php

namespace App\Http\Controllers;

use App\Http\Requests\BagianStoreRequest;
use App\Http\Requests\BagianUpdateRequest;
use App\Models\Bagian;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BagianKelolaController extends Controller
{

    public function index(): View|JsonResponse
    {
        $bagian = Bagian::select('id', 'nama_bagian')->orderBy('nama_bagian')->get();

        if (request()->ajax()) {
            return datatables()->of($bagian)
                ->addIndexColumn()
                ->addColumn('action', 'menu.kelolabagian.datatable.action')
                ->rawColumns(['action'])
                ->toJson();
        }

   
        return view('menu.kelolabagian.index');
    }

    public function store(BagianStoreRequest $request): RedirectResponse
    {
        Bagian::create($request->validated());

        return redirect()->route('bagian.index')->with('success', 'Data berhasil ditambahkan!');
    }

     public function update(BagianUpdateRequest $request, Bagian $bagian): RedirectResponse
    {
        $bagian->update($request->validated());

        return redirect()->route('bagian.index')->with('success', 'Data berhasil diubah!');
    }

     public function destroy(Bagian $bagian): RedirectResponse
    {
        if ($bagian->retribusi()->exists()) {
            return redirect()->route('bagian.index')->with('warning', 'Data yang memiliki relasi tidak dapat dihapus!');
        }

        $bagian->delete();

        return redirect()->route('bagian.index')->with('success', 'Data berhasil dihapus!');
    }
}
