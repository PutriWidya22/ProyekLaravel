@extends('admin.index.index')
@section('title', 'Form Edit')

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
        <a class="nav-link" href="/admin/produk">
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
      </li>
  
    </ul>
  
  </aside>
@endsection
@section('content')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Form Edit</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/produk">Produk</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <form role="form" action="{{url('/admin/produk/update/'. $data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <h5 class="card-title">Edit Produk</h5>
                            <!-- General Form Elements -->
                                <div class="row mb-3">
                                    <label for="inputID" class="col-sm-2 col-form-label">ID</label>
                                    <input type="number" class="form-control" name="id" value="{{$data->id}}">
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNama" class="col-sm-5 col-form-label">Nama Sepatu</label>
                                    <input type="text" class="form-control" name="nama_produk" value="{{$data->nama_produk}}">
                                </div>

                                <div class="row mb-3">
                                    <label for="inputKategori" class="col-sm-2 col-form-label">Kategori</label>
                                    <select name="id_kategori" class="custom-select form-control">
                                        @foreach($kategori as $k )
                                        <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputWarnar" class="col-sm-2 col-form-label">Warna</label>
                                    {{-- <input type="text" class="form-control" name="warna" value="{{$data->id_warna}}">
                                     --}}
                                     <select name="id_warna" class="custom-select form-control">
                                      @foreach($color as $k )
                                      <option value="{{ $k->id }}">{{ $k->color }}</option>
                                      @endforeach
                                    </select>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputUkuran" class="col-sm-2 col-form-label">Ukuran</label>
                                    <select name="id_ukuran" class="custom-select form-control">
                                      @foreach($size as $k )
                                      <option value="{{ $k->id }}">{{ $k->size }}</option>
                                      @endforeach
                                    </select>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputStok" class="col-sm-2 col-form-label">Stok</label>
                                    <input type="number" class="form-control" name="stok" value="{{$data->stok}}">
                                </div>

                                <div class="row mb-3">
                                    <label for="inputHarga" class="col-sm-2 col-form-label">Harga</label>
                                    <input type="varchar" class="form-control" name="harga" value="{{$data->harga}}">
                                </div>

                                <div class="row mb-3">
                                    <label for="inputGambar" class="col-sm-2 col-form-label">Gambar</label>
                                    <input class="form-control" type="file" name="gambar" value="{{$data->gambar}}">
                                </div>

                                <div class="col-sm-10">
                                    <button type="submit" class="float-right btn btn-primary">Submit</button>
                                </div>

                            </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>

        </div>
    </section>

</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@endsection
