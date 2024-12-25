<?php

namespace App\Http\Controllers;

class LaporanController extends Controller
{


    public function reportPembelianBarang()
    {
        return view('laporan.pembelian-barang');
    }

    public function reportStockBarang()
    {
        return view('laporan.stock-barang');
    }

    public function reportRefund()
    {
        return view('laporan.refund-retur');
    }

}
