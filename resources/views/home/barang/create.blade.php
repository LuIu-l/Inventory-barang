@extends('layouts.mater')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('barang.index') }}">Barang</a></li>
              <li class="breadcrumb-item active">Tambah</li>
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
              <h3 class="card-title">Form Tambah Barang</h3>
            </div>
            <form action="{{ route('barang.store') }}" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="kode_barang">Kode Barang</label>
                  <input type="text" name="kode_barang" class="form-control @error('kode_barang') is-invalid @enderror" id="kode_barang" placeholder="Masukkan Kode Barang" value="{{ old('kode_barang') }}">
                  @error('kode_barang')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="nama_barang">Nama Barang</label>
                  <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" placeholder="Masukkan Nama Barang" value="{{ old('nama_barang') }}">
                  @error('nama_barang')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="jenis_id">Jenis Barang</label>
                  <select name="jenis_id" class="form-control @error('jenis_id') is-invalid @enderror" id="jenis_id">
                    <option value="">-- Pilih Jenis --</option>
                    @foreach($jenis as $j)
                      <option value="{{ $j->id }}" {{ old('jenis_id') == $j->id ? 'selected' : '' }}>{{ $j->nama_jenis }}</option>
                    @endforeach
                  </select>
                  @error('jenis_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="supplier_id">Supplier</label>
                  <select name="supplier_id" class="form-control @error('supplier_id') is-invalid @enderror" id="supplier_id">
                    <option value="">-- Pilih Supplier --</option>
                    @foreach($supplier as $s)
                      <option value="{{ $s->id }}" {{ old('supplier_id') == $s->id ? 'selected' : '' }}>{{ $s->nama_supplier }}</option>
                    @endforeach
                  </select>
                  @error('supplier_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="harga">Harga</label>
                  <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Masukkan Harga" value="{{ old('harga') }}">
                  @error('harga')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="stok">Stok</label>
                  <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="Masukkan Stok" value="{{ old('stok') }}">
                  @error('stok')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="satuan">Satuan</label>
                  <input type="text" name="satuan" class="form-control @error('satuan') is-invalid @enderror" id="satuan" placeholder="Masukkan Satuan (contoh: Pcs, Box, dll)" value="{{ old('satuan') }}">
                  @error('satuan')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('barang.index') }}" class="btn btn-default">Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>

@endsection
