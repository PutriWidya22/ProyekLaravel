@extends('client.index.index')
@section('title', 'Checkout')

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
                <p class="bread"><span><a href="/">Home</a></span> / <span>Checkout</span></p>
            </div>
        </div>
    </div>
</div>

<div class="colorlib-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form method="post" id="form-data" action="/customer/checkout/selesai" class="colorlib-form">
                    @csrf
                    <h2>Billing Details</h2>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fname">Nama Lengkap <span>*</span></label><br>
                                <input type="text" name="nama_order" value="{{ session('name') }}" class="form-control" required readonly>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nomor Telephone <span>*</span></label>
                                <input type="text" name="no_hp" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Provinsi <span>*</span></label><br>
                                <select name="province_id" id="province_id" class="form-control" onchange="selectCity(this.value)">
                                    <option value="">-- Pilih Provinsi --</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Kota <span>*</span></label>
                                <select name="city_id" id="city_id" class="form-control">
                                    <option value="">-- Pilih Kota --</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Alamat Lengkap <span>*</span></label>
                                <input type="text" name="address_detail" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Kurir <span>*</span></label>
                                <select name="courier" id="courier" class="form-control" onchange="onCost(this.value)">
                                    <option value="">-- Pilih Kurir --</option>
                                    <option value="jne">JNE</option>
                                    <option value="tiki">TIKI</option>
                                    <option value="pos">POS INDONESIA</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Service <span>*</span></label>
                                <select name="service" id="service" class="form-control" onchange="onTotal(this.value)">
                                    <option value="">-- Pilih service --</option>
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="subTotal" id="getSubTotal" value="{{$pesanan->jumlah_harga}}">
                        <input type="hidden" name="shipping" id="getShipping">
                        <input type="hidden" name="province" id="getProvince">
                        <input type="hidden" name="city" id="getCity">
                        <input type="hidden" name="total" id="getTotal">

                    </div>
                </form>
            </div>
        </div>
        
        <?php $no = 1; ?>

            {{-- <div class="col-lg-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cart-detail">
                            <h2>Cart Total</h2>
                            <ul>
                                <li>
                                    <span>Order Total</span> <span id="subTotal"
                                        name="subTotal">@currency($pesanan->jumlah_harga)</span>
                                </li>
                                <li><span>Ongkir</span> <span id="shipping" name="shipping">$0</span></li>
                                <li><span>Total </span> <span id="total" name="total">$0</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="w-100"></div> --}}


            <div class="row">
                <div class="col-lg-12">
                    <div class="total-wrap">
                        <div class="row">
                            <div class="col-lg-12 text-left">
                                <div class="total">
                                    <div class="sub">
                                        <h5> Detail Order </h5>
                                        <p><span>Subtotal :</span> <span>@currency($pesanan->jumlah_harga)</span></p>
                                        <p><span>Ongkir :</span> <span id="shipping" name="shipping"> Rp 0</span></p>
                                    </div>

                                    <div class="grand-total">
                                        <p><span><strong>Total :</strong></span> <span id="total" name="total"></span></p>
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p><a href="/customer/checkout/selesai" onclick="event.preventDefault(); document.getElementById('form-data').submit();" class="btn btn-primary">Checkout</a></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                


                        <div class="gototop js-top">
                            <a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
                        </div>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                        <script>
                            selectProvince();

                            function selectProvince() {
                                $.get('{{ url("/customer/checkout/province") }}', function(res) {
                                    data = jQuery.parseJSON(res.province);
                                    province = data.rajaongkir.results;
                                    province.forEach(item => {
                                        $('#province_id').append(`<option value="${item.province_id}">${item.province}</option>`);
                                    });
                                });
                            };

                            function selectCity(province) {
                                $.get('{{ url("/customer/checkout/city") }}/' + province, function(res) {
                                    data = jQuery.parseJSON(res.city);
                                    province = data.rajaongkir.results;
                                    province.forEach(item => {
                                        $('#city_id').append(`<option value="${item.city_id},${item.province},${item.city_name}">${item.city_name}</option>`);
                                    });
                                });
                            }

                            function onCost(courier) {
                                data = $('#city_id').val();
                                city = data.split(",");
                                $('#getProvince').val(city[1]);
                                $('#getCity').val(city[2]);
                                var data = {
                                    'city': city[0]
                                    , 'courier': courier
                                , }
                                $.post(
                                    '{{ url("/customer/checkout/cost") }}'
                                    , JSON.stringify(data)
                                    , function(res) {
                                        data = jQuery.parseJSON(res.cost);
                                        cost = data.rajaongkir.results[0].costs;
                                        // console.log(cost);
                                        cost.forEach(item => {
                                            $('#service').append(`<option value="${item.service},${item.cost[0].value},${item.cost[0].etd}">${item.service} - ${item.cost[0].value} ( ${item.cost[0].etd} hari )</option>`);
                                        });
                                    }
                                    , "JSON"
                                , )

                            }

                            function onTotal(shipping) {
                                // untuk menaruh harga ongkir di id shipping
                                ongkir = shipping.split(",");
                                $('#shipping').text(rupiah(ongkir[1]));
                                $('#getShipping').val(ongkir[1]);

                                //mengambil data di id subtotal
                                subTotal = $('#getSubTotal').val();

                                // menjumlahkan ongkir dan subtotal
                                //tanda + didepan variable mengkonvert string menjadi number
                                $('#total').text(rupiah((+subTotal) + (+ongkir[1])));
                                $('#getTotal').val((+subTotal) + (+ongkir[1]));
                            }

                            function rupiah(uang) {
                                return new Intl.NumberFormat("id-ID", {
                                    style: "currency"
                                    , currency: "IDR"
                                }).format(uang);
                            }

                        </script>

                        @endsection
