<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\jenis;
use App\Models\supplier;

class Barangcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = barang::with('jenis', 'supplier')->paginate(10);
        return view('home.barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis = jenis::all();
        $supplier = supplier::all();
        return view('home.barang.create', compact('jenis', 'supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|string|max:20|unique:barangs',
            'nama_barang' => 'required|string|max:150',
            'jenis_id' => 'required|integer|exists:jenis,id',
            'supplier_id' => 'required|integer|exists:suppliers,id',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required|string|max:20',
        ]);

        barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'jenis_id' => $request->jenis_id,
            'supplier_id' => $request->supplier_id,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
        ]);

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil ditambahkan.');
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
        $barang = barang::find($id);
        $jenis = jenis::all();
        $supplier = supplier::all();
        return view('home.barang.edit', compact('barang', 'jenis', 'supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_barang' => 'required|string|max:20|unique:barangs,kode_barang,' . $id,
            'nama_barang' => 'required|string|max:150',
            'jenis_id' => 'required|integer|exists:jenis,id',
            'supplier_id' => 'required|integer|exists:suppliers,id',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required|string|max:20',
        ]);

        $barang = barang::find($id);
        $barang->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'jenis_id' => $request->jenis_id,
            'supplier_id' => $request->supplier_id,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
        ]);

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = barang::find($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus.');
    }
}
