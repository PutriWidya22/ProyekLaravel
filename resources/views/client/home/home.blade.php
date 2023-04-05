@extends('client.index.index')
@section('title', 'Home')

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
                    <li class="active"><a href="/">Home</a></li>
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
                    <li class="cart"><a href="/customer/keranjang"><i class="icon-shopping-cart"></i>
                            @if(!empty($notif))
                            <span class="badge badge-danger">{{ $notif }}</span>
                            @endif
                        </a>
                    </li>

                    <li>
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
                    </li>

                    @else
                    <li class="active"><a href="/">Home</a></li>
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

<aside id="colorlib-hero">
    <div class="flexslider">
        <ul class="slides">
            <li style="background-image: url({{ asset('02Customer') }}/images/sneakers_slide.jpg);">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3 text-center slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h1 class="head-1">Koleksi</h1>
                                    <h2 class="head-2">Berbagai</h2>
                                    <h2 class="head-3">Sepatu</h2>
                                    <p><a href="/customer/product" class="btn btn-primary">Belanja Sekarang</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li style="background-image: url({{ asset('02Customer') }}/images/flatshoes_slide.jpg);">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3 text-center slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h1 class="head-1">Sepatu</h1>
                                    <h2 class="head-2">Termurah</h2>
                                    <p class="category"><span>di Yogyakarta</span></p>
                                    <p><a href="/customer/product" class="btn btn-primary">Belanja Sekarang</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li style="background-image: url({{ asset('02Customer') }}/images/bg4.jpg);">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3 text-center slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h1 class="head-1">Berkualitas</h1>
                                    <h2 class="head-2">Tinggi</h2>
                                    <p><a href="/customer/product" class="btn btn-primary">Belanja Sekarang</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>

<div class="colorlib-intro">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="intro">Category</h2>
            </div>
        </div>
    </div>
</div>

<div class="colorlib-product">
    <div class="container-fluid">
        <div class="row">
            @foreach($data as $d)
            <div class="col-sm-4 text-center">
                <a href="/customer/product/view-category/{{$d->id}}">
                    <div class="featured">
                        <img src="{{$d->gambar}}" class="img-fluid">
                        <div class="desc">
                            <h2>{{$d->nama_kategori}}</h2>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="colorlib-partner">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
                <h2>Trusted Partners</h2>
            </div>
        </div>
        <div class="row">
            <div class="col partner-col text-center">
                <img src="{{ asset('02Customer') }}/images/brand-1.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
            </div>
            <div class="col partner-col text-center">
                <img src="{{ asset('02Customer') }}/images/brand-2.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
            </div>
            <div class="col partner-col text-center">
                <img src="{{ asset('02Customer') }}/images/brand-3.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
            </div>
            <div class="col partner-col text-center">
                <img src="{{ asset('02Customer') }}/images/brand-4.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
            </div>
            <div class="col partner-col text-center">
                <img src="{{ asset('02Customer') }}/images/brand-5.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection