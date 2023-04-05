@extends('client.index.index')
@section('title', 'Riwayat Belanja')

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
                <p class="bread"><span><a href="/">Home</a></span> / <span>Riwayat Belanja</span></p>
            </div>
        </div>
    </div>
</div>

<div class="colorlib-product">
    <div class="container">
        <div class="row row-pb-lg">
            <div class="col-md-12">
                <form action="/customer/keranjang" method="post">
                    @csrf
                    <div class="product-name d-flex">
                        <div class="one-forth text-left px-4">
                            <span>Invoice ID</span>
                        </div>
                        <div class="one-forth text-left px-4">
                            <span>Tanggal</span>
                        </div>
                        <div class="one-forth text-left px-4">
                            <span>Total</span>
                        </div>
                        <div class="one-forth text-left px-4">
                            <span>Status</span>
                        </div>

                        <div class="one-forth text-left px-3">
                            <span>Action</span>
                        </div>
                    </div>

                    @foreach($orders as $order)

                    <div class="product-cart d-flex">
                        <div class="one-forth">
                            <div class="display-tc">
                                <h3>{{ $order->invoice }}</h3>
                            </div>
                        </div>
                        <div class="one-forth">
                            <div class="display-tc">
                                <h3>{{ $order->created_at }}</h3>
                            </div>
                        </div>
                        <div class="one-forth">
                            <div class="display-tc">
                                <h3>@currency($order->total)</h3>
                            </div>
                        </div>
                        <div class="one-forth">
                            <div class="display-tc">
                                <h3>{{ $order->status }}</h3>
                            </div>
                        </div>
                        <div class="one-forth">
                            <div class="display-tc">
                                <a href="/customer/checkout/detailOrder/{{$order->invoice}}"><button type="button" class="btn btn-warning btn-sm">Detail</button></a>
                                <a href="/customer/checkout/bayar/{{$order->invoice}}"><button type="button" class="btn btn-danger btn-sm">Bayar</button></a>
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