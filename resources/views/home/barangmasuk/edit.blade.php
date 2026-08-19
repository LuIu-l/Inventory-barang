@extends('layouts.mater')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Barang Masuk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('barangmasuk.index') }}">Barang Masuk</a></li>
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
              <h3 class="card-title">Form Edit Barang Masuk</h3>
            </div>
            <form action="{{ route('barangmasuk.update', $barangmasuk->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="kode_transaksi">Kode Transaksi</label>
                  <input type="text" name="kode_transaksi" class="form-control @error('kode_transaksi') is-invalid @enderror" id="kode_transaksi" placeholder="Masukkan Kode Transaksi" value="{{ old('kode_transaksi', $barangmasuk->kode_transaksi) }}">
                  @error('kode_transaksi')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="barang_id">Barang</label>
                  <select name="barang_id" class="form-control @error('barang_id') is-invalid @enderror" id="barang_id">
                    <option value="">-- Pilih Barang --</option>
                    @foreach($barang as $b)
                      <option value="{{ $b->id }}" {{ old('barang_id', $barangmasuk->barang_id) == $b->id ? 'selected' : '' }}>{{ $b->nama_barang }}</option>
                    @endforeach
                  </select>
                  @error('barang_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="supplier_id">Supplier</label>
                  <select name="supplier_id" class="form-control @error('supplier_id') is-invalid @enderror" id="supplier_id">
                    <option value="">-- Pilih Supplier --</option>
                    @foreach($supplier as $s)
                      <option value="{{ $s->id }}" {{ old('supplier_id', $barangmasuk->supplier_id) == $s->id ? 'selected' : '' }}>{{ $s->nama_supplier }}</option>
                    @endforeach
                  </select>
                  @error('supplier_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="jumlah">Jumlah Masuk</label>
                  <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Masukkan Jumlah" value="{{ old('jumlah', $barangmasuk->jumlah) }}">
                  @error('jumlah')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="tanggal_masuk">Tanggal Masuk</label>
                  <input type="date" name="tanggal_masuk" class="form-control @error('tanggal_masuk') is-invalid @enderror" id="tanggal_masuk" value="{{ old('tanggal_masuk', $barangmasuk->tanggal_masuk) }}">
                  @error('tanggal_masuk')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" rows="3" placeholder="Keterangan (Opsional)">{{ old('keterangan', $barangmasuk->keterangan) }}</textarea>
                  @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('barangmasuk.index') }}" class="btn btn-default">Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>

@endsection
