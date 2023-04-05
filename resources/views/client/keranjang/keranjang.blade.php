@extends('client.index.index')
@section('title', 'Keranjang')

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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                <p class="bread"><span><a href="/">Home</a></span> / <span>Keranjang</span></p>
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
                            <span>Detail Produk</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Harga</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Jumlah</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Total Harga</span>
                        </div>
                        <div class="one-eight text-center px-4">
                            <span>Action</span>
                        </div>
                    </div>

                    <?php $no = 1; ?>
                    @foreach($pesanan_details as $pesanan_detail)
                    <div class="product-cart d-flex">
                        <div class="one-forth">
                            <div class="product-img">
                                <img src="{{$pesanan_detail->produk->gambar}}" class="img-fluid">
                            </div>
                            <div class="display-tc">
                                <h3>{{ $pesanan_detail->produk->nama_produk }}</h3>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <span class="harga">@currency($pesanan_detail->produk->harga)</span>

                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <span class="jumlah">{{ $pesanan_detail->jumlah }}</span>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <td class="cart__total">@currency($pesanan_detail->jumlah_harga) </td>

                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <a href="/customer/detail/destroy/{{$pesanan_detail->id}}" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Anda yakin akan menghapus data ?');">Hapus</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="row">
                        <div class="form-group">
                            @if ($pesanan)
                                <a href="/customer/checkout/view/{{$pesanan->id}}" class="btn btn-primary">Proceed to
                                    checkout</a>
                            @else
                                <a href="#" class="btn btn-primary">Proceed to checkout</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
    integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection