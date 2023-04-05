@extends('client.index.index')
@section('title', 'About')

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
                    <li class="active"><a href="/customer/about">About</a></li>
                    <li><a href="/customer/contact">Contact</a></li>

                    <?php
                    $pesanan_utama = \App\Models\Pesanan::where('user_id', session('id'))->where('id_order',0)->first();
                    if(!empty($pesanan_utama))
                       {
                        $notif = \App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count(); 
                       }
                    ?>
                    <li class="cart"><a href="/customer/keranjang"><i class="icon-shopping-cart"></i>
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
                    <li class="active"><a href="/customer/about">About</a></li>
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
                <p class="bread"><span><a href="/">Home</a></span> / <span>About</span></p>
            </div>
        </div>
    </div>
</div>

<div class="colorlib-about">
    <div class="container">
        <div class="row row-pb-lg">
            <div class="col-sm-6 mb-3">
                <div class="video colorlib-video" style="background-image: url({{ asset('02Customer') }}/images/item-13.jpg);">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="about-wrap">
                    <h2>Alesha Website</h2>
                    <p> Toko Alesha merupakan toko yang menjual berbagai sepatu di Bantul, Yogyakarta. Sudah berdiri sejak 2010 dan berkembang baik bahkan memiliki
                        3 cabang yaitu di kota Bandung, Jakarta, dan Solo. Website Alesha menyediakan berbagai jenis sepatu mulai dari Flastshoes, Sneakers, dan Wedges.
                    </p>
                    <p>Selamat berbelanja di toko kami! <br>
                        Buka : Senin - Sabtu <br>
                        Jam Operasional: 08.00 - 17.00 </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection