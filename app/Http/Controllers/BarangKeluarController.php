<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barangkeluar;
use App\Models\barang;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangkeluar = barangkeluar::with('barang')->paginate(10);
        return view('home.barangkeluar.index', compact('barangkeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = barang::all();
        return view('home.barangkeluar.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_transaksi' => 'required|string|max:30|unique:barangkeluars',
            'barang_id' => 'required|integer|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $barang = barang::find($request->barang_id);

        // Validasi stok tidak boleh minus
        if ($barang->stok < $request->jumlah) {
            return back()->withInput()->withErrors(['jumlah' => 'Stok tidak cukup. Stok tersedia: ' . $barang->stok]);
        }

        // Create barang keluar
        barangkeluar::create([
            'kode_transaksi' => $request->kode_transaksi,
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'tanggal_keluar' => $request->tanggal_keluar,
            'keterangan' => $request->keterangan,
        ]);

        // Update stok barang
        $barang->stok -= $request->jumlah;
        $barang->save();

        return redirect()->route('barangkeluar.index')->with('success', 'Data barang keluar berhasil ditambahkan dan stok terupdate.');
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
        $barangkeluar = barangkeluar::find($id);
        $barang = barang::all();
        return view('home.barangkeluar.edit', compact('barangkeluar', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_transaksi' => 'required|string|max:30|unique:barangkeluars,kode_transaksi,' . $id,
            'barang_id' => 'required|integer|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $barangkeluar = barangkeluar::find($id);
        $old_jumlah = $barangkeluar->jumlah;
        $new_jumlah = $request->jumlah;

        $barang = barang::find($request->barang_id);

        // Validasi stok tidak boleh minus
        $diff = $new_jumlah - $old_jumlah;
        if ($barang->stok < $diff) {
            return back()->withInput()->withErrors(['jumlah' => 'Stok tidak cukup untuk perubahan ini. Stok tersedia: ' . $barang->stok]);
        }

        // Update barang keluar
        $barangkeluar->update([
            'kode_transaksi' => $request->kode_transaksi,
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'tanggal_keluar' => $request->tanggal_keluar,
            'keterangan' => $request->keterangan,
        ]);

        // Update stok barang
        $barang->stok -= $diff;
        $barang->save();

        return redirect()->route('barangkeluar.index')->with('success', 'Data barang keluar berhasil diperbarui dan stok terupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barangkeluar = barangkeluar::find($id);
        $barang = barang::find($barangkeluar->barang_id);
        $barang->stok += $barangkeluar->jumlah;
        $barang->save();

        $barangkeluar->delete();

        return redirect()->route('barangkeluar.index')->with('success', 'Data barang keluar berhasil dihapus dan stok terupdate.');
    }
}
