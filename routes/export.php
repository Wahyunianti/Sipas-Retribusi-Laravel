<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Export\LaporanRetribusiController;

Route::get('/cetak/export', LaporanRetribusiController::class)->name('cetak.export');
