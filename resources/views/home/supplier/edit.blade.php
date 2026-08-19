@extends('layouts.mater')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Supplier</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('supplier.index') }}">Supplier</a></li>
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
              <h3 class="card-title">Form Edit Supplier</h3>
            </div>
            <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="kode_supplier">Kode Supplier</label>
                  <input type="text" name="kode_supplier" class="form-control @error('kode_supplier') is-invalid @enderror" id="kode_supplier" placeholder="Masukkan Kode Supplier" value="{{ old('kode_supplier', $supplier->kode_supplier) }}">
                  @error('kode_supplier')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="nama_supplier">Nama Supplier</label>
                  <input type="text" name="nama_supplier" class="form-control @error('nama_supplier') is-invalid @enderror" id="nama_supplier" placeholder="Masukkan Nama Supplier" value="{{ old('nama_supplier', $supplier->nama_supplier) }}">
                  @error('nama_supplier')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="3" placeholder="Masukkan Alamat">{{ old('alamat', $supplier->alamat) }}</textarea>
                  @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="telepon">Telepon</label>
                  <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror" id="telepon" placeholder="Masukkan Telepon" value="{{ old('telepon', $supplier->telepon) }}">
                  @error('telepon')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('supplier.index') }}" class="btn btn-default">Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>

@endsection
