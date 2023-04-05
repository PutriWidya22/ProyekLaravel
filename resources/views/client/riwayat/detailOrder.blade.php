@extends('client.index.index')
@section('title', 'Detail Order')

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
                    <li><a href="/customer">Home</a></li>
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
                <p class="bread"><span><a href="/customer">Home</a></span> / <span>Detail Order</span></p>
            </div>
        </div>
    </div>
</div>

<div class="colorlib-product">
    <div class="container">
        <h3>Detail Order</h3>
        <a href="/customer/checkout/download/{{$order->invoice}}"><button type="button" class="btn btn-warning btn-sm">Download</button></a>
        {{-- <a href="/customer/checkout/lihat/{{$order->invoice}}" target=" blank"><button type="button" class="btn btn-warning btn-sm">View</button></a> --}}
        <hr>
        <h6>Order id : {{$pesanan->order->invoice}} </h6>
        <h6>Tanggal : {{$pesanan->order->created_at}} </h6>
        <h6>Customer : {{$pesanan->order->nama_order}} </h6>
        <h6>Alamat : {{$pesanan->order->address_detail. ', ' . $pesanan->order->destination}} </h6>
        <h6>Kurir : {{$pesanan->order->courier}} </h6>
        <h6>No Hp : {{$pesanan->order->no_hp}} </h6>
        <h6>Total Belanja : @currency($pesanan->order->total) </h6>
        <hr>
        <div class="row row-pb-lg">
            <div class="col-md-12">
                <form action="/customer/keranjang" method="post">
                    @csrf
                    <div class="product-name d-flex">

                        <div class="one-forth text-left px-4">
                            <span>Detail Produk</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Jumlah</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Harga</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Total Harga</span>
                        </div>
                    </div>

                    <?php $no = 1; ?>
                    @foreach ($pesanan->pesananDetail as $pesanan)
                    <div class="product-cart d-flex">
                        <div class="one-forth">
                            <div class="product-img">
                                <img src="{{ $pesanan->produk->gambar }}" class="img-fluid">
                            </div>
                            <div class="display-tc">
                                <h3>{{ $pesanan->produk->nama_produk }}</h3>
                            </div>
                        </div>

                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <h3>{{ $pesanan->jumlah }}</h3>
                            </div>
                        </div>

                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <h3>@currency($pesanan->produk->harga)</h3>
                            </div>
                        </div>

                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <h3>@currency($pesanan->jumlah_harga)</h3>
                            </div>
                        </div>
                    </div>
                        @endforeach
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection