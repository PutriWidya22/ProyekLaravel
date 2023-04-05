@extends('admin.index.index')
@section('title', 'Table Kategori')
@section('sidebar')

<aside id="sidebar" class="sidebar" data-color="purple" data-background-color="white">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item {{ Request::is('admin') ? 'active' : ''}}">
      <a class="nav-link collapsed " href="/admin">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item {{ Request::is('/admin/produk') ? 'active' : ''}}">
      <a class="nav-link collapsed" href="/admin/produk">
        <i class="bi bi-box"></i>
        <span>Produk</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item {{ Request::is('/admin/kategori') ? 'active' : ''}}">
      <a class="nav-link collapsed" href="/admin/kategori">
        <i class="bi bi-list-task"></i>
        <span>Kategori</span>
      </a>
    </li><!-- End Dashboard Nav -->

    {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="/admin/logo">
        <i class="bi bi-list-task"></i>
        <span>Logo</span>
      </a>
    </li><!-- End Dashboard Nav --> --}}

    <li class="nav-item">
      <a class="nav-link collapsed" href="/admin/pesan">
        <i class="bi bi-envelope"></i>
        <span>Pesan</span>
      </a>
    </li><!-- End Contact Page Nav -->

    <li class="nav-item">
      <a class="nav-link " href="/admin/color">
        <i class="bi bi-palette"></i>
        <span>Warna</span>
      </a>
    </li><!-- End Contact Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="/admin/size">
        <i class="bi bi-aspect-ratio"></i>
        <span>Ukuran</span>
      </a>
    </li><!-- End Contact Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="/admin/order">
        <i class="bi bi-bag"></i>
        <span>Order</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="/admin/logo">
        <i class="bi bi-coin"></i>
        <span>Transaksi</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed " href="/logout">
        <i class="bi bi-box-arrow-right"></i>
        <span>Logout</span>
      </a>
    </li><!-- End Login Page Nav -->

  </ul>

</aside>
@endsection
@section('content')

<link rel="stylesheet" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>


<main id="main" class="main">
  <div class="pagetitle">
      <h1>Warna</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Warna</li>
        </ol>
      </nav>
  </div>

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Top Selling -->
          <div class="col-15">
            <div class="card top-selling overflow-auto">

              <div class="card-body pb-0">
                
                <div class="card-header">
                  <center>DATA WARNA<br>
                  </div>
                  <div class="card-header">
                    @if(session()->has('message'))
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            {{session('message')}}  
                            
                        </div> 
                        @endif   
                  <a href="/admin/color/add"><button class="btn btn-sm btn-primary float-right">Tambah</button></a>
                </div>

                <table id="myTable" class="table table-borderless">
                  
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Warna</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no=1;
                    ?>  
                    @foreach ($data as $d)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$d->color}}</td>
                      <td>
                        {{-- <a href="/admin/color/details/{{$d->id}}"><button type="button" class="btn btn-warning btn-sm">Edit</button></a> --}}
                        <a href="/admin/color/delete/{{$d->id}}"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  
                </table>

              </div>

            </div>
          </div>
          <!-- End Top Selling -->

        </div>
      </div>
      <!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">
      </div>
      <!-- End Right side columns -->

    </div>
  </section>
</main>

<script>
  $(document).ready(function () {
    $('#myTable').DataTable();
  });
</script>

@endsection