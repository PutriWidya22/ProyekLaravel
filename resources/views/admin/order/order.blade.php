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
      <a class="nav-link collapsed " href="/admin/kategori">
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
      <a class="nav-link collapsed" href="/admin/color">
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
      <a class="nav-link" href="/admin/order">
        <i class="bi bi-bag"></i>
        <span>Order</span>
      </a>
    </li><!-- End Contact Page Nav -->

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

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Order</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active">Order</li>
          </ol>
        </nav>
    </div>
  
    <section class="section dashboard">
      <div class="row">

<!-- Left side columns -->
<div class="col-lg-12">
    <div class="row">

<div class="col-12">
    <div class="card recent-sales overflow-auto">

        <div class="card-body">
            <h5 class="card-title">Data Pesanan </h5>

            <table class="table table-borderless datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Customer</th>
                        <th>Total Harga</th>
                        <th>Status</th>
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
                        <td>{{$d->created_at}}</td>
                        <td>{{$d->nama_order}}</td>
                        <td>@currency($d->total)</td>
                        <td>{{$d->status}}</td>
                        <td>
                            <a href="/admin/order/detail/{{$d->invoice}}"><button type="button" class="btn btn-warning btn-sm">Detail</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div><!-- End Recent Sales -->

@endsection