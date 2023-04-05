@extends('admin.index.index')
@section('title', 'Table Pesan')

@section('sidebar')

<aside id="sidebar" class="sidebar" data-color="purple" data-background-color="white">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item {{ Request::is('admin') ? 'active' : ''}}">
      <a class="nav-link collapsed" href="/admin">
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

    {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="/admin/logo">
        <i class="bi bi-list-task"></i>
        <span>Logo</span>
      </a>
    </li><!-- End Dashboard Nav --> --}}

    <li class="nav-item">
      <a class="nav-link" href="/admin/pesan">
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

<main id="main" class="main">
  <div class="pagetitle">
      <h1>Detail Pesan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item"><a href="/admin/pesan">Pesan</a></li>
          <li class="breadcrumb-item active">Detail Pesan</li>
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
                  <th><center><b>{{$data->firstname}} {{$data->lastname}}</th><br>
                </div>

                <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Pesan</h5>
                  <h5>{{$data->message}}</h5>
                </div>
                <div class="mt-4">
                  <a href="/admin/pesan"><button type="button" class="btn btn-secondary btn-sm">Kembali</button></a>
                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>


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
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  </section>
</main>

@endsection