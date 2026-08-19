@extends('layouts.mater')
@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard Inventory Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totalJenis }}</h3>
                <p>Jenis Barang</p>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
              <a href="{{ route('jenis.index') }}" class="small-box-footer">Lihat Data <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $totalSupplier }}</h3>
                <p>Supplier</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-cart"></i>
              </div>
              <a href="{{ route('supplier.index') }}" class="small-box-footer">Lihat Data <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $totalBarang }}</h3>
                <p>Total Barang</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('barang.index') }}" class="small-box-footer">Lihat Data <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $totalStok }}</h3>
                <p>Total Stok</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ route('barang.index') }}" class="small-box-footer">Lihat Data <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <!-- More stats -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $totalUsers }}</h3>
                <p>Total User</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('User.index') }}" class="small-box-footer">Lihat Data <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-olive">
              <div class="inner">
                <h3>{{ $totalBarangMasuk }}</h3>
                <p>Barang Masuk</p>
              </div>
              <div class="icon">
                <i class="ion ion-arrow-down-a"></i>
              </div>
              <a href="{{ route('barangmasuk.index') }}" class="small-box-footer">Lihat Data <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-orange">
              <div class="inner">
                <h3>{{ $totalBarangKeluar }}</h3>
                <p>Barang Keluar</p>
              </div>
              <div class="icon">
                <i class="ion ion-arrow-up-a"></i>
              </div>
              <a href="{{ route('barangkeluar.index') }}" class="small-box-footer">Lihat Data <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

@endsection