<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jenis;

class Jeniscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis = jenis::paginate(10);
        return view('home.jenis.index', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.jenis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_jenis' => 'required|string|max:20|unique:jenis',
            'nama_jenis' => 'required|string|max:100',
        ]);

        jenis::create([
            'kode_jenis' => $request->kode_jenis,
            'nama_jenis' => $request->nama_jenis,
        ]);

        return redirect()->route('jenis.index')->with('success', 'Data jenis berhasil ditambahkan.');
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
        $jenis = jenis::find($id);
        return view('home.jenis.edit', compact('jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_jenis' => 'required|string|max:20|unique:jenis,kode_jenis,' . $id,
            'nama_jenis' => 'required|string|max:100',
        ]);

        $jenis = jenis::find($id);
        $jenis->update([
            'kode_jenis' => $request->kode_jenis,
            'nama_jenis' => $request->nama_jenis,
        ]);

        return redirect()->route('jenis.index')->with('success', 'Data jenis berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenis = jenis::find($id);
        $jenis->delete();

        return redirect()->route('jenis.index')->with('success', 'Data jenis berhasil dihapus.');
    }
}
