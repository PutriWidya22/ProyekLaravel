@extends('client.index.index')
@section('title', 'Selesai')

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
                    <li><a href="/login">Login</a></li>
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
                <p class="bread"><span><a href="/">Home</a></span> / <span>Order Berhasil</span></p>
            </div>
        </div>
    </div>
</div>

<div class="colorlib-product">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 offset-sm-1 text-center">
                <p class="icon-addcart"><span><i class="icon-check"></i></span></p>
                <h2 class="mb-4">Terimakasih Telah Order, Pesanan Anda Akan Segera Diproses</h2>
                <p>
                    <a href="/customer/checkout/riwayat" class="btn btn-primary btn-outline-primary">Riwayat Belanja</a>
                    <a href="/customer/product" class="btn btn-primary btn-outline-primary"><i class="icon-shopping-cart"></i> Lanjut Belanja</a>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
</div>

@endsection
