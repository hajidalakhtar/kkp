<?php

namespace App\Http\Controllers;

use App\Models\PermintaanBarang;
use App\Models\Produk;
use Illuminate\Http\Request;

class PermintaanBarangController extends Controller
{

    public function __construct()
    {
        $this->middleware('web');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $permintaanBarnag = PermintaanBarang::all();
        return view('permintaan-barang.index', compact("permintaanBarnag"));
    }

    public function requestBarang()
    {

        $produk = Produk::all();
        return view('permintaan-barang.request', compact("produk"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_peminta.*' => 'required|string|max:255',
            'id_barang.*' => 'required|exists:produks,id',
            'jumlah.*' => 'required|integer|min:1',
            'deskripsi.*' => 'required',
            'no_form.*' => 'required',
            'tanggal.*' => 'required',
            'harga.*' => 'required',
        ]);

        foreach ($request->id_barang as $key => $value) {
            \App\Models\PermintaanBarang::create([
                'nama_karyawan' => $request->nama_peminta[$key],
                'id_barang' => $request->id_barang[$key],
                'jumlah' => $request->jumlah[$key],
                'deskripsi' => $request->deskripsi[$key],
                'status' => 'pending',
                'no_form' => $request->no_form[$key],
                'tanggal' => $request->tanggal[$key],
                'harga' => $request->harga[$key],
            ]);
        }

        return redirect()->back()->with('success', 'Permintaan barang berhasil diajukan');

    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function approve(string $id)
    {
        $permintaan = PermintaanBarang::findOrFail($id);
        $permintaan->status = 'approved';
        $permintaan->save();


        $stock = Produk::find($permintaan->id_barang);
        $stock->stock += $permintaan->jumlah;

        return redirect()->back()->with('success', 'Permintaan barang berhasil disetujui');
    }

    public function reject(string $id)
    {
        $permintaan = PermintaanBarang::findOrFail($id);
        $permintaan->status = 'rejected';
        $permintaan->save();
        return redirect()->back()->with('success', 'Permintaan barang berhasil ditolak');
    }
}
