<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Jeniscontroller;
use App\Http\Controllers\Suppliercontroller;
use App\Http\Controllers\Barangcontroller;
use App\Http\Controllers\Barangmasukcontroller;
use App\Http\Controllers\BarangKeluarController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index']);

// User Routes
Route::get('/User', [UserController::class, 'index'])->name('User.index');
Route::get('/User/create', [UserController::class, 'create'])->name('User.create');
Route::post('/User', [UserController::class, 'store'])->name('User.store');
route::get('/User/{id}/edit', [UserController::class, 'edit'])->name('User.edit');
route::put('/User/{id}', [UserController::class, 'update'])->name('User.update');
route::delete('/User/{id}', [UserController::class, 'destroy'])->name('User.destroy');

// Jenis Routes
Route::get('/jenis', [Jeniscontroller::class, 'index'])->name('jenis.index');
Route::get('/jenis/create', [Jeniscontroller::class, 'create'])->name('jenis.create');
Route::post('/jenis', [Jeniscontroller::class, 'store'])->name('jenis.store');
Route::get('/jenis/{id}/edit', [Jeniscontroller::class, 'edit'])->name('jenis.edit');
Route::put('/jenis/{id}', [Jeniscontroller::class, 'update'])->name('jenis.update');
Route::delete('/jenis/{id}', [Jeniscontroller::class, 'destroy'])->name('jenis.destroy');

// Supplier Routes
Route::get('/supplier', [Suppliercontroller::class, 'index'])->name('supplier.index');
Route::get('/supplier/create', [Suppliercontroller::class, 'create'])->name('supplier.create');
Route::post('/supplier', [Suppliercontroller::class, 'store'])->name('supplier.store');
Route::get('/supplier/{id}/edit', [Suppliercontroller::class, 'edit'])->name('supplier.edit');
Route::put('/supplier/{id}', [Suppliercontroller::class, 'update'])->name('supplier.update');
Route::delete('/supplier/{id}', [Suppliercontroller::class, 'destroy'])->name('supplier.destroy');

// Barang Routes
Route::get('/barang', [Barangcontroller::class, 'index'])->name('barang.index');
Route::get('/barang/create', [Barangcontroller::class, 'create'])->name('barang.create');
Route::post('/barang', [Barangcontroller::class, 'store'])->name('barang.store');
Route::get('/barang/{id}/edit', [Barangcontroller::class, 'edit'])->name('barang.edit');
Route::put('/barang/{id}', [Barangcontroller::class, 'update'])->name('barang.update');
Route::delete('/barang/{id}', [Barangcontroller::class, 'destroy'])->name('barang.destroy');

// Barang Masuk Routes
Route::get('/barangmasuk', [Barangmasukcontroller::class, 'index'])->name('barangmasuk.index');
Route::get('/barangmasuk/create', [Barangmasukcontroller::class, 'create'])->name('barangmasuk.create');
Route::post('/barangmasuk', [Barangmasukcontroller::class, 'store'])->name('barangmasuk.store');
Route::get('/barangmasuk/{id}/edit', [Barangmasukcontroller::class, 'edit'])->name('barangmasuk.edit');
Route::put('/barangmasuk/{id}', [Barangmasukcontroller::class, 'update'])->name('barangmasuk.update');
Route::delete('/barangmasuk/{id}', [Barangmasukcontroller::class, 'destroy'])->name('barangmasuk.destroy');

// Barang Keluar Routes
Route::get('/barangkeluar', [BarangKeluarController::class, 'index'])->name('barangkeluar.index');
Route::get('/barangkeluar/create', [BarangKeluarController::class, 'create'])->name('barangkeluar.create');
Route::post('/barangkeluar', [BarangKeluarController::class, 'store'])->name('barangkeluar.store');
Route::get('/barangkeluar/{id}/edit', [BarangKeluarController::class, 'edit'])->name('barangkeluar.edit');
Route::put('/barangkeluar/{id}', [BarangKeluarController::class, 'update'])->name('barangkeluar.update');
Route::delete('/barangkeluar/{id}', [BarangKeluarController::class, 'destroy'])->name('barangkeluar.destroy');


