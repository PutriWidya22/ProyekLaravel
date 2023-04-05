@extends('admin.index.index')
@section('title', 'Table Kategori')

@section('sidebar')

<aside id="sidebar" class="sidebar" data-color="purple" data-background-color="white">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item {{ Request::is('admin') ? 'active' : ''}}">
      <a class="nav-link " href="/admin">
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
      <a class="nav-link  collapsed " href="/admin/kategori">
        <i class="bi bi-list-task"></i>
        <span>Kategori</span>
      </a>
    </li><!-- End Dashboard Nav -->

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
      <a class="nav-link collapsed" href="/admin/order">
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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
  </div>

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

            <div class="col-xxl-4 col-md-4">
                <div class="card info-card revenue-card">

                  <div class="card-body">
                    <h5 class="card-title">Order</h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-bag"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{$pemesanan_count}}</h6>
                      </div>
                    </div>
                  </div>
  
                </div>
              </div><!-- End Revenue Card -->

              <div class="col-xxl-4 col-md-4">
                <div class="card info-card revenue-card">

                  <div class="card-body">
                    <h5 class="card-title">Produk</h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                       
                        <i class="bi bi-box"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{$produk_count}}</h6>
                      </div>
                    </div>
                  </div>
  
                </div>
              </div><!-- End Revenue Card -->

              <div class="col-xxl-4 col-md-4">
                <div class="card info-card revenue-card">

                  <div class="card-body">
                    <h5 class="card-title">Kategori</h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-list-ul"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{$kategori_count}}</h6>
                      </div>
                    </div>
                  </div>
  
                </div>
              </div><!-- End Revenue Card -->

        </div>
      </div>
      <!-- End Left side columns -->


    </div>
  </section>
</main>

@endsection