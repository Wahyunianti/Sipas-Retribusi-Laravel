<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PenggunaKelolaController extends Controller
{

    public function index(): View|JsonResponse
    {
        $users = User::with('roles:id,role_name')
        ->select('id', 'name', 'email', 'role_id')->orderBy('name')->get();

        if (request()->ajax()) {
            return datatables()->of($users)
                ->addIndexColumn()
                ->addColumn(
                    'role_id',
                    fn ($model) => $model->roles->role_name
                )
                ->addColumn('action', 'menu.pengguna.datatable.action')
                ->toJson();
        }

        $roles = Role::select('id', 'role_name')->orderBy('role_name')->get();
        
        return view('menu.pengguna.index', [
            'roles' => $roles
        ]);
    }


    public function store(UserStoreRequest $request): RedirectResponse
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id
        ]);

        return redirect()->route('pengguna.index')->with('success', 'Data berhasil ditambahkan!');
    }

 
    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id
        ]);
        
        return redirect()->route('pengguna.index')->with('success', 'Data berhasil diubah!');
    }


    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('pengguna.index')->with('success', 'Data berhasil dihapus!');
    }
}
