<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\jenis;
use App\Models\supplier;
use App\Models\barang;
use App\Models\barangmasuk;
use App\Models\barangkeluar;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalJenis = jenis::count();
        $totalSupplier = supplier::count();
        $totalBarang = barang::count();
        $totalBarangMasuk = barangmasuk::count();
        $totalBarangKeluar = barangkeluar::count();
        $totalStok = barang::sum('stok');

        return view('home.dashboard', compact(
            'totalUsers',
            'totalJenis',
            'totalSupplier',
            'totalBarang',
            'totalBarangMasuk',
            'totalBarangKeluar',
            'totalStok'
        ));
    }
}
