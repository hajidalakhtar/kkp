<?php

namespace App\Http\Controllers;

use App\Models\PermintaanBarang;
use App\Models\PettyCash;
use App\Models\Produk;
use App\Models\Project;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{


    public function reportPembelianBarang()
    {
        return view('laporan.pembelian-barang');
    }

    public function exportPembelianBarangCSV()
    {
        $data = PermintaanBarang::select('nama_karyawan', 'id_barang', 'jumlah', 'status', 'deskripsi', 'no_form', 'tanggal', 'harga')->get();

        $pdf = PDF::loadView('laporan.pembelian-barang', compact('data'));
        return $pdf->download('pembelian_barang_' . date('Ymd_His') . '.pdf');
    }

    public function exportPembelianPettyCast()
    {
        $data = PettyCash::all();


        $pdf = PDF::loadView('laporan.pembelian-petty-cash', compact('data'));
        return $pdf->download('pembelian_petty_cash_' . date('Ymd_His') . '.pdf');
    }

    public function reportStockBarang()
    {
        return view('laporan.stock-barang');
    }


    public function exportStockBarangCSV()
    {
        $data = Produk::select('name', 'stock', 'status')->get();

        $pdf = PDF::loadView('laporan.stock-barang', compact('data'));

        return $pdf->download('stock_barang_' . date('Ymd_His') . '.pdf');
    }


    public function reportRefund()
    {
        return view('laporan.project');
    }


    public function exportProjectCSV()
    {
        $data = Project::select('nama', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai')->get();

        $pdf = PDF::loadView('laporan.project', compact('data'));

        return $pdf->download('project_data_' . date('Ymd_His') . '.pdf');
    }
}
