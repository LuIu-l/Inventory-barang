@extends('layouts.mater')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Supplier</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Supplier</li>
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
              <h3>Data Supplier <a class="btn btn-primary float-right" href="{{ route('supplier.create') }}">Tambah Supplier</a></h3>
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
                    <th>Kode Supplier</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($supplier as $s)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $s->kode_supplier }}</td>
                      <td>{{ $s->nama_supplier }}</td>
                      <td>{{ $s->alamat ?? '-' }}</td>
                      <td>{{ $s->telepon ?? '-' }}</td>
                      <td>
                        <a href="{{ route('supplier.edit', $s->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('supplier.destroy', $s->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="6" class="text-center">Tidak ada data supplier</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
              
              <div class="d-flex justify-content-center">
                {{ $supplier->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

@endsection
