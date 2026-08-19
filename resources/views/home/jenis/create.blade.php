@extends('layouts.mater')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Jenis</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('jenis.index') }}">Jenis</a></li>
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
              <h3 class="card-title">Form Tambah Jenis</h3>
            </div>
            <form action="{{ route('jenis.store') }}" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="kode_jenis">Kode Jenis</label>
                  <input type="text" name="kode_jenis" class="form-control @error('kode_jenis') is-invalid @enderror" id="kode_jenis" placeholder="Masukkan Kode Jenis" value="{{ old('kode_jenis') }}">
                  @error('kode_jenis')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="nama_jenis">Nama Jenis</label>
                  <input type="text" name="nama_jenis" class="form-control @error('nama_jenis') is-invalid @enderror" id="nama_jenis" placeholder="Masukkan Nama Jenis" value="{{ old('nama_jenis') }}">
                  @error('nama_jenis')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('jenis.index') }}" class="btn btn-default">Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>

@endsection
