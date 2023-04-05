@extends('client.index.index')
@section('title', 'Table Produk')
@section('header')

<div class="top-menu">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-md-9">
                <div id="colorlib-logo"><a href="/">Alesha</a></div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 text-left menu-1">
                <ul>
                    @if(Auth::check())
                    <li><a href="/">Home</a></li>
                    <li><a href="/customer/product">Product</a></li>
                    <li><a href="/customer/about">About</a></li>
                    <li><a href="/customer/contact">Contact</a></li>

                    <?php
                    $pesanan_utama = \App\Models\Pesanan::where('user_id', session('id'))->where('id_order',0)->first();
                    if(!empty($pesanan_utama))
                       {
                        $notif = \App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count(); 
                       }
                    ?>
                    <li class="cart active"><a href="/customer/keranjang"><i class="icon-shopping-cart"></i>
                            @if(!empty($notif))
                            <span class="badge badge-danger">{{ $notif }}</span>
                            @endif
                        </a>
                    </li>

                    <li class="cart">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{session('name')}} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/logout">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Logout</span>
                            </a>
                            <a class="dropdown-item" href="/customer/checkout/riwayat">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Riwayat Belanja</span>
                            </a>
                        </div>
                    </li>

                    @else
                    <li><a href="/">Home</a></li>
                    <li><a href="/customer/product">Product</a></li>
                    <li><a href="/customer/about">About</a></li>
                    <li><a href="/customer/contact">Contact</a></li>
                    @endif   
                </ul>
            </div>
        </div>

    </div>
</div>
@endsection
@section('content')

<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="bread"><span><a href="/">Home</a></span> / <span>Detail Produk</span></p>
            </div>
        </div>
    </div>
</div>

<div class="colorlib-product">
    <div class="container">
        <div class="row row-pb-lg product-detail-wrap">

            <div class="col-sm-8">
                <img src="{{$produk->gambar}}" class="img-fluid">
            </div>

            <div class="col-sm-4">
                <div class="product-desc">
                    <h3>{{$produk->nama_produk}}</h3>
                    <p class="price">
                        <span>@currency($produk->harga)</span>
                    </p>
                    <div>
                        <h5>Jumlah</h5>
                        <form method="post" action="/customer/detail/keranjang/{{$produk->id}}">
                            @csrf
                            <input type="number" name="jumlah_pesan" class="form-control" required="">
                            <button type="submit" onclick="return confirm('Berhasil masuk keranjang');" class="btn btn-primary mt-2">Masukkan Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-md-12 pills">
                        <div class="bd-example bd-example-tabs">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-description-tab" data-toggle="pill" role="tab" aria-controls="pills-description" aria-expanded="true">Description</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane border fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                                    <p>Harap membaca deskripsi produk sebelum membeli, barang yang sudah dibeli tidak dapat dikembalikan !!</p>
                                    <ul>
                                        <li>Nama : {{$produk->nama_produk}}</li>
                                        <li>Stok : {{$produk->stok}}</li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection