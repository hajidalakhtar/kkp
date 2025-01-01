<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $projects = Project::all();
        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'document_spk_owner' => 'nullable|file|mimes:pdf,doc,docx',
            'document_invoice_tagihan' => 'nullable|file|mimes:pdf,doc,docx',
            'document_laporan_progress' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $project = new Project();
        $project->nama = $request->nama;
        $project->deskripsi = $request->deskripsi;
        $project->tanggal_mulai = $request->tanggal_mulai;
        $project->tanggal_selesai = $request->tanggal_selesai;

        if ($request->hasFile('document_spk_owner')) {
            $project->document_spk_owner = $request->file('document_spk_owner')->store('documents');
        }

        if ($request->hasFile('document_invoice_tagihan')) {
            $project->document_invoice_tagihan = $request->file('document_invoice_tagihan')->store('documents');
        }

        if ($request->hasFile('document_laporan_progress')) {
            $project->document_laporan_progress = $request->file('document_laporan_progress')->store('documents');
        }

        $project->save();

        return redirect()->route('project.index')->with('success', 'Project created successfully.');


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
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'document_spk_owner' => 'nullable|file|mimes:pdf,doc,docx',
            'document_invoice_tagihan' => 'nullable|file|mimes:pdf,doc,docx',
            'document_laporan_progress' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $project = Project::findOrFail($id);
        $project->nama = $request->nama;
        $project->deskripsi = $request->deskripsi;
        $project->tanggal_mulai = $request->tanggal_mulai;
        $project->tanggal_selesai = $request->tanggal_selesai;
        try {
            if ($request->hasFile('document_spk_owner')) {
                $project->document_spk_owner = $request->file('document_spk_owner')->store('documents');
            }
        } catch (\Exception $e) {
            dd("asdasd");
            return redirect()->route('project.index')->with('error', 'Failed to upload document SPK owner.');
        }

        try {
            if ($request->hasFile('document_invoice_tagihan')) {
                $project->document_invoice_tagihan = $request->file('document_invoice_tagihan')->store('documents');
            }
        } catch (\Exception $e) {
            dd("asdasd");
            return redirect()->route('project.index')->with('error', 'Failed to upload document invoice tagihan.');
        }

        try {
            if ($request->hasFile('document_laporan_progress')) {
                $project->document_laporan_progress = $request->file('document_laporan_progress')->store('documents');
            }
        } catch (\Exception $e) {
            dd("asdasd");
            return redirect()->route('project.index')->with('error', 'Failed to upload document laporan progress.');
        }

        $project->save();

        return redirect()->route('project.index')->with('success', 'Project updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Project::destroy($id);
        return redirect()->route('project.index')->with('success', 'Project deleted successfully.');
    }
}
