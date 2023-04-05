@extends('client.index.index')
@section('title', 'Contact')

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
                    <li class="active"><a href="/customer/contact">Contact</a></li>

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
                        @endif</a>
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
                <p class="bread"><span><a href="/">Home</a></span> / <span>Contact</span></p>
            </div>
        </div>
    </div>
</div>

<div id="colorlib-contact">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3>Contact Information</h3>
                <div class="row contact-info-wrap">
                    <div class="col-md-3">
                        <p><span><i class="icon-location"></i></span> Jl. Anggrek No 02, <br> Bantul, Daerah Istimewa Yogyakarta</p>
                    </div>
                    <div class="col-md-3">
                        <p><span><i class="icon-whatsapp"></i></span> <a href="https://wa.me/6285601535956?text=Mau%20bertanya%20tentang%20pembelian%20di%20toko%20Alesha">+62 856-0153-5956</a></p>
                    </div>
                    <div class="col-md-3">
                        <p><span><i class="icon-mail"></i></span> <a href="mailto:pw98421@gmail.com">Alesha@gmail.com</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="contact-wrap">
                    <h3>Pesan</h3>
                    <form role="form" action="{{url('/customer/contact/create')}}" class="contact-form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fname">Nama Depan</label>
                                    <input type="text" id="fname" name="firstname" class="form-control" placeholder="Masukkan nama depan anda" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lname">Nama Belakang</label>
                                    <input type="text" id="lname" name="lastname" class="form-control" placeholder="Masukkan nama belakang anda" required="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email anda" required="">
                                </div>
                            </div>
                            <div class="w-100"></div>

                            <div class="w-100"></div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="message">Pesan</label>
                                    <textarea name="message" name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Tuliskan pesan anda" required=""></textarea>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="submit" value="Kirim Pesan" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.971850829169!2d110.40612281397863!3d-7.7928049943841415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59e18b1c28d1%3A0xe2d750662f2edace!2sUniversitas%20Teknologi%20Digital%20Indonesia%20(UTDI)!5e0!3m2!1sid!2sid!4v1676347765929!5m2!1sid!2sid" width="600" height="700" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection
