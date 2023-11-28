<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function dologin(Request $request) {
        // validasi
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($credentials)) {

            // buat ulang session login
            $request->session()->regenerate();

            if (auth()->user()->role_id === 1) {
                // jika user admin
                // return redirect(RouteServiceProvider::HOME)->with('success', 'Selamat datang ' . auth()->user()->name . ' !');
                return redirect()->intended('/admin');
            } else {
                // jika user pegawai
                // return redirect(RouteServiceProvider::HOME)->with('success', 'Selamat datang ' . auth()->user()->name . ' !');

                return redirect()->intended('/kepala');
            }
        }

        // jika email atau password salah
        // kirimkan session error
        return back()->with('error', 'email atau password salah');
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
