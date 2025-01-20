<?php

namespace App\Http\Controllers;

use App\Models\PettyCash;
use App\Models\Produk;
use Illuminate\Http\Request;

class PettyCashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $product = Produk::all();

        $pettyCash = PettyCash::all();
        return view('petty-cash.index', compact(["pettyCash", "product"]));

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
            'nama_barang.*' => 'required',
            'tanggal.*' => 'required|date',
            'jumlah.*' => 'required|integer',
            'harga.*' => 'required|integer',
            'deskripsi.*' => 'required|string|max:255',
        ]);

        foreach ($request->nama_barang as $key => $value) {
            PettyCash::create([
                'nama_barang' => $request->nama_barang[$key],
                'tanggal' => $request->tanggal[$key],
                'jumlah' => $request->jumlah[$key],
                'harga' => $request->harga[$key],
                'deskripsi' => $request->deskripsi[$key],
            ]);
        }


        return redirect()->route('petty-cash.index')->with('success', 'Petty cash created successfully.');
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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer',
            'harga' => 'required|integer',
            'deskripsi' => 'required|string|max:255',
        ]);

        $pettyCash = PettyCash::find($id);
        $pettyCash->update([
            'nama_barang' => $request->nama_barang,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('petty-cash.index')->with('success', 'Petty cash updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pettyCash = PettyCash::find($id);
        $pettyCash->delete();
        return redirect()->back();
    }
}
