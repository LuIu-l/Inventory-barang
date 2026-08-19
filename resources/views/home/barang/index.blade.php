@extends('layouts.mater')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Barang</li>
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
              <h3>Data Barang <a class="btn btn-primary float-right" href="{{ route('barang.create') }}">Tambah Barang</a></h3>
            </div>
            <div class="card-body">
              @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('success') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif
              
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jenis</th>
                    <th>Supplier</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($barang as $b)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $b->kode_barang }}</td>
                      <td>{{ $b->nama_barang }}</td>
                      <td>{{ $b->jenis->nama_jenis }}</td>
                      <td>{{ $b->supplier->nama_supplier }}</td>
                      <td>Rp {{ number_format($b->harga, 0, ',', '.') }}</td>
                      <td><span class="badge badge-info">{{ $b->stok }}</span></td>
                      <td>{{ $b->satuan }}</td>
                      <td>
                        <a href="{{ route('barang.edit', $b->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('barang.destroy', $b->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="9" class="text-center">Tidak ada data barang</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
              
              <div class="d-flex justify-content-center">
                {{ $barang->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

@endsection
