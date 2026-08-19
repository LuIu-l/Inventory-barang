@extends('layouts.mater')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Barang Keluar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('barangkeluar.index') }}">Barang Keluar</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Form Edit Barang Keluar</h3>
            </div>
            <form action="{{ route('barangkeluar.update', $barangkeluar->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="kode_transaksi">Kode Transaksi</label>
                  <input type="text" name="kode_transaksi" class="form-control @error('kode_transaksi') is-invalid @enderror" id="kode_transaksi" placeholder="Masukkan Kode Transaksi" value="{{ old('kode_transaksi', $barangkeluar->kode_transaksi) }}">
                  @error('kode_transaksi')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="barang_id">Barang</label>
                  <select name="barang_id" class="form-control @error('barang_id') is-invalid @enderror" id="barang_id">
                    <option value="">-- Pilih Barang --</option>
                    @foreach($barang as $b)
                      <option value="{{ $b->id }}" {{ old('barang_id', $barangkeluar->barang_id) == $b->id ? 'selected' : '' }}>{{ $b->nama_barang }} (Stok saat ini: {{ $b->stok }})</option>
                    @endforeach
                  </select>
                  @error('barang_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="jumlah">Jumlah Keluar</label>
                  <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Masukkan Jumlah" value="{{ old('jumlah', $barangkeluar->jumlah) }}">
                  @error('jumlah')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="tanggal_keluar">Tanggal Keluar</label>
                  <input type="date" name="tanggal_keluar" class="form-control @error('tanggal_keluar') is-invalid @enderror" id="tanggal_keluar" value="{{ old('tanggal_keluar', $barangkeluar->tanggal_keluar) }}">
                  @error('tanggal_keluar')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" rows="3" placeholder="Keterangan (Opsional)">{{ old('keterangan', $barangkeluar->keterangan) }}</textarea>
                  @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('barangkeluar.index') }}" class="btn btn-default">Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>

@endsection
