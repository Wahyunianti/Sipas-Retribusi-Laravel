<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\DashboardChartController;
use App\Http\Controllers\API\v1\LoginController;
use App\Http\Controllers\API\v1\LogoutController;
use App\Http\Controllers\API\v1\RetribusiController;
use App\Http\Controllers\API\v1\PenggunaController;
use App\Http\Controllers\API\v1\PasarController;
use App\Http\Controllers\API\v1\BagianController;


Route::name('api.')->prefix('v1')->group(function () {
    Route::post('/login', [LoginController::class, 'login'])->name('login');


    Route::middleware('jwt')->group(function () {
        Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
        Route::get('/pasar/{id}/edit', [PasarController::class, 'edit'])->name('pasar.edit');
        Route::get('/bagian/{id}/edit', [BagianController::class, 'edit'])->name('bagian.edit');
        Route::get('/retribusis/{id}/edit', [RetribusiController::class, 'edit'])->name('retribusis.edit');
        Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');
        Route::get('/chart', DashboardChartController::class)->name('chart');
    });
});

