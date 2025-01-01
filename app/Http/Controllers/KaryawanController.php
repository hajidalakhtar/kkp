<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $karyawan = Karyawan::all();
        return view('karyawan.index', compact('karyawan'));
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
            'nama' => 'required',
            'email' => 'required',
            'telepon' => 'required',
            'jabatan' => 'required',
            'divisi' => 'required',
            'alamat' => 'required',
        ]);

        try {
            Karyawan::create($request->all());
            return redirect()->route('karyawan.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('karyawan.index')->with('error', 'Data gagal ditambahkan');
        };
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
    public
    function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'telepon' => 'required',
            'jabatan' => 'required',
            'divisi' => 'required',
            'alamat' => 'required',
        ]);

        try {
            Karyawan::find($id)->update($request->all());
            return redirect()->route('karyawan.index')->with('success', 'Data berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->route('karyawan.index')->with('error', 'Data gagal diubah');
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Karyawan::destroy($id);
            return redirect()->route('karyawan.index')->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('karyawan.index')->with('error', 'Data gagal dihapus');
        };
    }
}
