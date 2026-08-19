@extends('layouts.mater')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h3>Sample Table <a class="btn btn-primary" href="{{ route('User.create') }}">Tambah User</a></h3>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $u)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $u->name }}</td>
                      <td>{{ $u->email }}</td>
                      <td>
                        <a href="" class="btn btn-sm btn-warning">Edit</a>
                        <a href="" class="btn btn-sm btn-danger">Hapus</a>
                      </td>
                    </tr>
                  @endforeach {{-- Added missing @endforeach --}}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

</div>

@endsection