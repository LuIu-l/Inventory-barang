@extends('layouts.mater')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Barang Masuk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Barang Masuk</li>
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
              <h3>Data Barang Masuk <a class="btn btn-primary float-right" href="{{ route('barangmasuk.create') }}">Tambah Barang Masuk</a></h3>
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
                    <th>Supplier</th>
                    <th>Jumlah</th>
                    <th>Tanggal Masuk</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($barangmasuk as $bm)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $bm->kode_transaksi }}</td>
                      <td>{{ $bm->barang->nama_barang }}</td>
                      <td>{{ $bm->supplier->nama_supplier }}</td>
                      <td><span class="badge badge-success">{{ $bm->jumlah }}</span></td>
                      <td>{{ \Carbon\Carbon::parse($bm->tanggal_masuk)->format('d/m/Y') }}</td>
                      <td>{{ $bm->keterangan ?? '-' }}</td>
                      <td>
                        <a href="{{ route('barangmasuk.edit', $bm->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('barangmasuk.destroy', $bm->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus? Stok akan dikurangi kembali')">Hapus</button>
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="8" class="text-center">Tidak ada data barang masuk</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
              
              <div class="d-flex justify-content-center">
                {{ $barangmasuk->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

@endsection
