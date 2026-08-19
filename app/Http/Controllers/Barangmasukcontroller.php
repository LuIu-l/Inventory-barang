<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barangmasuk;
use App\Models\barang;
use App\Models\supplier;

class Barangmasukcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangmasuk = barangmasuk::with('barang', 'supplier')->paginate(10);
        return view('home.barangmasuk.index', compact('barangmasuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = barang::all();
        $supplier = supplier::all();
        return view('home.barangmasuk.create', compact('barang', 'supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_transaksi' => 'required|string|max:30|unique:barangmasuks',
            'barang_id' => 'required|integer|exists:barangs,id',
            'supplier_id' => 'required|integer|exists:suppliers,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        // Create barang masuk
        barangmasuk::create([
            'kode_transaksi' => $request->kode_transaksi,
            'barang_id' => $request->barang_id,
            'supplier_id' => $request->supplier_id,
            'jumlah' => $request->jumlah,
            'tanggal_masuk' => $request->tanggal_masuk,
            'keterangan' => $request->keterangan,
        ]);

        // Update stok barang
        $barang = barang::find($request->barang_id);
        $barang->stok += $request->jumlah;
        $barang->save();

        return redirect()->route('barangmasuk.index')->with('success', 'Data barang masuk berhasil ditambahkan dan stok terupdate.');
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
        $barangmasuk = barangmasuk::find($id);
        $barang = barang::all();
        $supplier = supplier::all();
        return view('home.barangmasuk.edit', compact('barangmasuk', 'barang', 'supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_transaksi' => 'required|string|max:30|unique:barangmasuks,kode_transaksi,' . $id,
            'barang_id' => 'required|integer|exists:barangs,id',
            'supplier_id' => 'required|integer|exists:suppliers,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $barangmasuk = barangmasuk::find($id);
        $old_jumlah = $barangmasuk->jumlah;
        $new_jumlah = $request->jumlah;

        // Update barang masuk
        $barangmasuk->update([
            'kode_transaksi' => $request->kode_transaksi,
            'barang_id' => $request->barang_id,
            'supplier_id' => $request->supplier_id,
            'jumlah' => $request->jumlah,
            'tanggal_masuk' => $request->tanggal_masuk,
            'keterangan' => $request->keterangan,
        ]);

        // Update stok barang
        $barang = barang::find($request->barang_id);
        $diff = $new_jumlah - $old_jumlah;
        $barang->stok += $diff;
        $barang->save();

        return redirect()->route('barangmasuk.index')->with('success', 'Data barang masuk berhasil diperbarui dan stok terupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barangmasuk = barangmasuk::find($id);
        $barang = barang::find($barangmasuk->barang_id);
        $barang->stok -= $barangmasuk->jumlah;
        $barang->save();

        $barangmasuk->delete();

        return redirect()->route('barangmasuk.index')->with('success', 'Data barang masuk berhasil dihapus dan stok terupdate.');
    }
}
