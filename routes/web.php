<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route("home");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('karyawan', App\Http\Controllers\KaryawanController::class);
Route::resource('project', App\Http\Controllers\ProjectController::class);

Route::get("request-barang", [App\Http\Controllers\PermintaanBarangController::class, "requestBarang"])->name("request-barang");
Route::resource('permintaan-barang', App\Http\Controllers\PermintaanBarangController::class);
Route::post("approve/{id}", [App\Http\Controllers\PermintaanBarangController::class, "approve"])->name("permintaan-barang.approve");
Route::post("reject/{id}", [App\Http\Controllers\PermintaanBarangController::class, "reject"])->name("permintaan-barang.reject");

Route::resource("stock", App\Http\Controllers\StockController::class);
Route::resource("petty-cash", App\Http\Controllers\PettyCashController::class);



Route::group(['prefix' => 'laporan', 'as' => 'laporan.'], function () {
    Route::get("pembelian-barang", [App\Http\Controllers\LaporanController::class, "reportPembelianBarang"])->name("pembelian-barang");
    Route::get("stock-barang", [App\Http\Controllers\LaporanController::class, "reportStockBarang"])->name("stock-barang");
    Route::get("refund-retur", [App\Http\Controllers\LaporanController::class, "reportRefund"])->name("refund-retur");


    Route::get("pembelian-barang/export", [App\Http\Controllers\LaporanController::class, "exportPembelianBarangCSV"])->name("pembelian-barang.export");
    Route::get("stock-barang/export", [App\Http\Controllers\LaporanController::class, "exportStockBarangCSV"])->name("stock-barang.export");
    Route::get("project/export", [App\Http\Controllers\LaporanController::class, "exportProjectCSV"])->name("project.export");
});
