<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenggunaStoreRequest;
use App\Http\Requests\PenggunaUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;


class KelolaPenggunaController extends Controller
{

    public function index(): View|JsonResponse
    {
        $pengguna = User::with('roles:id,role_name')
            ->select(
                'id',
                'name',
                'email',
                'password',
                'role_id'
            )
            ->orderBy('name')
            ->get();

        if (request()->ajax()) {
            return datatables()->of($pengguna)
            ->addIndexColumn()
            ->addColumn(
                'role_id',
                fn ($model) => $model->roles->role_name
            )
            ->addColumn('action', 'menu.pengguna.datatable.action')
            // ->rawColumns(['action', 'role_id'])                
            ->toJson();
        }

        $roles = Role::select('id', 'role_name')->orderBy('role_name')->get();
        
        return view('menu.pengguna.index', [
            'roles' => $roles
        ]);
    }

    public function store(PenggunaStoreRequest $request): RedirectResponse
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id
        ]);

        return redirect()->route('pengguna.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function update(PenggunaUpdateRequest $request, User $pengguna): RedirectResponse
    {
        // $pengguna->update($request->validated());

        $pengguna->update([
            'name' => $request->name,
            'email' => $request->email,

            // Jika inputan password kosong, isikan password yang sekarang, jika tidak kosong, isikan sesuai password di inputan
            // dan lakukan enkripsi.
            'password' => is_null($request->password) ? $administrator->password : bcrypt($request->password)
        ]);
        return redirect()->route('pengguna.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(User $pengguna): RedirectResponse
    {
        $pengguna->delete();

        return redirect()->route('pengguna.index')->with('success', 'Data berhasil dihapus!');
    }

}
