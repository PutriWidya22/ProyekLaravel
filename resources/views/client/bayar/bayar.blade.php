@extends('client.index.index')
@section('title', 'Transaksi')

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
                    <li class="cart"><a href="/customer/keranjang"><i class="icon-shopping-cart"></i>
                            @if(!empty($notif))
                            <span class="badge badge-danger">{{ $notif }}</span>
                            @endif
                        </a>
                    </li>

                    <li class="cart active">
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
                    <li class="active"><a href="/customer/contact">Contact</a></li>
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
                <p class="bread"><span><a href="/">Home</a></span> / <span>Bayar</span></p>
            </div>
        </div>
    </div>
</div>

<div id="colorlib-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-wrap">
                    <h3>Transaksi</h3>
                    <form method="post" id="form-data" action="{{url('/customer/checkout/kirim')}}" class="contact-form">
                        @csrf
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="email">Nomor Nota </label>
                                    <input type="text" id="id_invoice" name="id_invoice" value="{{$order->invoice}}" class="form-control" required readonly>
                                </div>
                            </div>
                            <div class="w-100"></div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fname">Nama</label>
                                    <input type="text" id="nama_customer" value="{{ session('name') }}" name="nama_customer" class="form-control" required readonly>
                                </div>
                            </div>
                            <div class="w-100"></div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="email">Upload Bukti Transfer</label>
                                    <input type="file" id="gambar" name="gambar" class="form-control" required="">
                                </div>
                            </div>
                            <div class="w-100"></div>

                            <div class="w-100"></div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <p><a href="/customer/checkout/kirim" onclick="event.preventDefault(); document.getElementById('form-data').submit();" class="btn btn-primary">Kirim</a></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection