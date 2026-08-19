@extends('layouts.mater')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Barang Keluar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Barang Keluar</li>
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
              <h3>Data Barang Keluar <a class="btn btn-primary float-right" href="{{ route('barangkeluar.create') }}">Tambah Barang Keluar</a></h3>
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
                    <th>Kode Transaksi</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Keluar</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($barangkeluar as $bk)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $bk->kode_transaksi }}</td>
                      <td>{{ $bk->barang->nama_barang }}</td>
                      <td><span class="badge badge-danger">{{ $bk->jumlah }}</span></td>
                      <td>{{ \Carbon\Carbon::parse($bk->tanggal_keluar)->format('d/m/Y') }}</td>
                      <td>{{ $bk->keterangan ?? '-' }}</td>
                      <td>
                        <a href="{{ route('barangkeluar.edit', $bk->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('barangkeluar.destroy', $bk->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus? Stok akan ditambah kembali')">Hapus</button>
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="7" class="text-center">Tidak ada data barang keluar</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
              
              <div class="d-flex justify-content-center">
                {{ $barangkeluar->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

@endsection
