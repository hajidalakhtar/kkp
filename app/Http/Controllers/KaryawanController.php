<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $karyawan = User::all();
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
//        $request->validate([
//            'name' => 'required',
//            'email' => 'required',
//            'password' => 'required',
//            'telepon' => 'required',
//            'jabatan' => 'required',
//            'divisi' => 'required',
//            'alamat' => 'required',
//        ]);

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'telepon' => $request->telepon,
                'jabatan' => $request->jabatan,
                'divisi' => "-",
                'alamat' => $request->alamat,
                'role' => "ADMIN_PROJECT", // Assuming role is also part of the request
            ]);
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

        try {
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'telepon' => $request->telepon,
                'jabatan' => $request->jabatan,
                'divisi' => "-",
                'alamat' => $request->alamat,
            ]);
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
            User::destroy($id);
            return redirect()->route('karyawan.index')->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('karyawan.index')->with('error', 'Data gagal dihapus');
        };
    }
}
