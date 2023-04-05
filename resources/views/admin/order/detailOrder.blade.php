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
                <li class="breadcrumb-item"><a href="/admin/order">Order</a></li>
                <li class="breadcrumb-item active">Detail Order</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">

        @if(session('message'))
        <div class="alert alert-success mb-3">{{session('message')}}</div>
        @endif

        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="card-body">
                                <h5 class="card-title">Detail Pesanan Pelanggan </h5>
                                <h6>Nota : {{$pesanan->order->invoice}}</h6>
                                <h6>Status : {{$order->status}}</h6>
                                <h6>Alamat : {{$pesanan->order->destination}}</h6>
                                <h6>Nomor Telephone : {{$pesanan->order->no_hp}}</h6>
                                <hr>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            
                                            <th>Gambar</th>
                                            <th>Produk</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pesanan->pesananDetail as $pesanan)
                                        <tr>
                                            {{-- <td> </td> --}}
                                            <td><img src="{{ $pesanan->produk->gambar }}" class="img-thumbnail" width="100" height="100" alt="..."></td>
                                            <td>{{ $pesanan->produk->nama_produk }}</td>
                                            <td>{{ $pesanan->jumlah }}</td>
                                            <td>@currency($pesanan->produk->harga)</td>
                                            <td>@currency($pesanan->jumlah_harga)</td>
                                        </tr>

                                    </tbody>
                                    @endforeach
                                </table>

                                <hr>

                                <h5 class="card-title">Status Order</h5>
					            <form action="{{url('admin/order/detail/'.$order->invoice)}}" method="post">
                                @csrf
                                    <div class="row mb-3 ">
                                    <select name="status"  class="custom-select form-control">
                                        <option value="">Pilih Status</option>
                                        <option value="Di Proses">Di Proses</option>
                                        <option value="Perjalanan">Perjalanan</option>
                                        <option value="Selesai">Selesai</option>
                                    </select>
                                    </div>

                                <div class="col-sm-10">
                                    <button type="submit" class="float-right btn btn-primary">Update</button>
                                </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

@endsection
