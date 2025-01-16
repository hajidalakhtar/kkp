<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $product = Produk::all();
        return view('stock.index', compact('product'));
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
            'name.*' => 'required|string|max:255',
            'stock.*' => 'required|numeric',
        ]);

        try {
            foreach ($request->name as $key => $value) {
                Produk::create([
                    'name' => $request->name[$key],
                    'stock' => $request->stock[$key],
                ]);
            }
            return redirect()->route('stock.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('stock.index')->with('error', 'Data gagal ditambahkan');
        }
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
        $request->validate([
            'name' => 'required',
            'stock' => 'required|numeric',
        ]);

        try {
            $produk = Produk::findOrFail($id);
            $produk->update($request->all());
            return redirect()->route('stock.index')->with('success', 'Data berhasil diperbarui');
        } catch (\Throwable $th) {
            return redirect()->route('stock.index')->with('error', 'Data gagal diperbarui');
    }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produk::destroy($id);
        return redirect()->route('stock.index')->with('success', 'Data berhasil dihapus');
    }
}
