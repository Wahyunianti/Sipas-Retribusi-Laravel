<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RetribusiKelolaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CSVimpController;
use App\Http\Controllers\RetribusiFilterController;
use App\Http\Controllers\CetakLaporanController;
use App\Http\Controllers\KelolaPenggunaController;
use App\Http\Controllers\PasarKelolaController;
use App\Http\Controllers\BagianKelolaController;
use App\Http\Controllers\TruncateTabelController;

require __DIR__ . '/auth.php';

Route::redirect('/', 'login');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::get('cetak', CetakLaporanController::class)->name('cetak');
    Route::get('truncate', [TruncateTabelController::class, 'truncateTabel'])->name('truncate.tabel');
    Route::get('tampilretribusi', RetribusiFilterController::class)->name('tampilretribusi');        
    Route::resource('retribusis',  RetribusiKelolaController::class, ['except' => ['create', 'edit']]);
    Route::resource('pengguna',  KelolaPenggunaController::class, ['except' => ['create', 'edit']]);
    Route::post('csv-import', [CSVimpController::class, 'import'])->name('csv.import');
    Route::resource('pasar', PasarKelolaController::class)->except('create', 'edit');
    Route::resource('bagian', BagianKelolaController::class)->except('create', 'edit');

    require __DIR__ . '/export.php';

});

