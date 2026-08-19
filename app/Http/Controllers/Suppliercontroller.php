<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\supplier;

class Suppliercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = supplier::paginate(10);
        return view('home.supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_supplier' => 'required|string|max:20|unique:suppliers',
            'nama_supplier' => 'required|string|max:100',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
        ]);

        supplier::create([
            'kode_supplier' => $request->kode_supplier,
            'nama_supplier' => $request->nama_supplier,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        return redirect()->route('supplier.index')->with('success', 'Data supplier berhasil ditambahkan.');
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
        $supplier = supplier::find($id);
        return view('home.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_supplier' => 'required|string|max:20|unique:suppliers,kode_supplier,' . $id,
            'nama_supplier' => 'required|string|max:100',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
        ]);

        $supplier = supplier::find($id);
        $supplier->update([
            'kode_supplier' => $request->kode_supplier,
            'nama_supplier' => $request->nama_supplier,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        return redirect()->route('supplier.index')->with('success', 'Data supplier berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = supplier::find($id);
        $supplier->delete();

        return redirect()->route('supplier.index')->with('success', 'Data supplier berhasil dihapus.');
    }
}
