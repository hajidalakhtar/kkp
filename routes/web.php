<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route("home");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('karyawan', App\Http\Controllers\KaryawanController::class);
Route::resource('project', App\Http\Controllers\ProjectController::class);
Route::resource('permintaan-barang', App\Http\Controllers\PermintaanBarangController::class);
Route::resource("stock", App\Http\Controllers\StockController::class);


Route::group(['prefix' => 'laporan', 'as' => 'laporan.'], function () {
    Route::get("pembelian-barang", [App\Http\Controllers\LaporanController::class, "reportPembelianBarang"])->name("pembelian-barang");
    Route::get("stock-barang", [App\Http\Controllers\LaporanController::class, "reportStockBarang"])->name("stock-barang");
    Route::get("refund-retur", [App\Http\Controllers\LaporanController::class, "reportRefund"])->name("refund-retur");
});
