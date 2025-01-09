<?php

namespace App\Http\Controllers;

use App\Models\PermintaanBarang;
use App\Models\Produk;
use App\Models\Project;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\StreamedResponse;

class LaporanController extends Controller
{


    public function reportPembelianBarang()
    {
        return view('laporan.pembelian-barang');
    }

    public function exportPembelianBarangCSV()
    {
        $fileName = 'pembelian_barang_' . date('Ymd_His') . '.csv';

        // Data untuk CSV
        $startAt = Carbon::parse(request('start_at'))->format('Y-m-d H:i:s');
        $endAt = Carbon::parse(request('end_at'))->format('Y-m-d H:i:s');
        $data = PermintaanBarang::whereBetween('created_at', [$startAt, $endAt])->get();
        // Headers CSV
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$fileName",
        ];

        // Stream response CSV
        return new StreamedResponse(function () use ($data) {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, ['Nama Karyawan', 'ID Barang', 'Jumlah', 'Status', 'Deskripsi']);

            foreach ($data as $item) {
                fputcsv($handle, [
                    $item->nama_karyawan, // Pastikan ada kolom 'nama_karyawan' di data
                    $item->id_barang,     // Pastikan ada kolom 'id_barang' di data
                    $item->jumlah,        // Kolom jumlah
                    $item->status,        // Kolom status
                    $item->deskripsi,     // Kolom deskripsi
                ]);
            }
            fclose($handle);
        }, 200, $headers);
    }

    public function reportStockBarang()
    {
        return view('laporan.stock-barang');
    }


    public function exportStockBarangCSV()
    {
        $fileName = 'stock_barang_' . date('Ymd_His') . '.csv';

        // Data untuk CSV
        $data = Produk::select('name', 'stock', 'status')->get();
        // Headers CSV
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$fileName",
        ];

        // Stream response CSV
        return new StreamedResponse(function () use ($data) {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, ['Name', 'Stock', 'Status']);

            foreach ($data as $item) {
                fputcsv($handle, [
                    $item->name,    // Kolom name
                    $item->stock,   // Kolom stock
                    $item->status,  // Kolom status
                ]);
            }
            fclose($handle);
        }, 200, $headers);
    }


    public function reportRefund()
    {
        return view('laporan.project');
    }


    public function exportProjectCSV()
    {
        $fileName = 'project_data_' . date('Ymd_His') . '.csv';

        // Data untuk CSV
        $data = Project::select('nama', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai')->get();
        // Headers CSV
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$fileName",
        ];

        // Stream response CSV
        return new StreamedResponse(function () use ($data) {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, ['Nama', 'Deskripsi', 'Tanggal Mulai', 'Tanggal Selesai']);

            foreach ($data as $item) {
                fputcsv($handle, [
                    $item->nama,             // Kolom nama
                    $item->deskripsi,        // Kolom deskripsi
                    $item->tanggal_mulai,    // Kolom tanggal_mulai
                    $item->tanggal_selesai,  // Kolom tanggal_selesai
                ]);
            }
            fclose($handle);
        }, 200, $headers);
    }
}
