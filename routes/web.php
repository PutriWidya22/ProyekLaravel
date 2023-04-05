<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\CustProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\OrderAdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Customer terbuka
// Route::get('/lamanhome', [AuthController::class, 'home']);
Route::get('/', [HomeController::class, 'index']);
Route::get('customer/about', [AboutController::class, 'index']);
Route::get('customer/contact', [ContactController::class, 'index']);
Route::post('/customer/contact/create', [ContactController::class, 'create']);
Route::get('/customer/contact/add', [ContactController::class, 'add']);
Route::get('/customer/product', [CustProductController::class, 'index']);
Route::get('/customer/product/view{product}', [CustProductController::class, 'viewproduct']);

Route::get('/customer/product/view-category/{id}', [CustProductController::class, 'viewcategory']);
Route::get('/customer/detail/view/{id}', [DetailController::class, 'index']);

// Login
Route::get('/login', [AuthController::class, 'index']);
Route::get('/adminLogin', [AuthController::class, 'adminIndex']);
Route::get('/register', [AuthController::class, 'register']);

Route::post('/adminAksiLogin', [AuthController::class, 'adminAksiLogin']);
Route::post('/aksiLogin', [AuthController::class, 'aksiLogin']);
Route::post('/aksiRegister', [AuthController::class, 'aksiRegister']);



// Middleware
Route::group(['middleware' => 'ceklogin'], function() {

    // Middleware
    Route::group(['middleware' => 'level'], function() {
        
        // Admin
        Route::get('/admin', [AdminController::class, 'index']);

        // Admin Produk
        Route::get('/admin/produk', [ProdukController::class, 'index']);
        Route::post('admin/produk/create', [ProdukController::class, 'create']);
        Route::get('admin/produk/details/{produk}', [ProdukController::class, 'detail']);
        Route::post('admin/produk/update/{produk}', [ProdukController::class, 'update']);
        Route::get('admin/produk/delete/{produk}', [ProdukController::class, 'delete']);
        Route::get('admin/produk/add', [ProdukController::class, 'add']);

        // Admin Logo
        Route::get('/admin/logo', [LogoController::class, 'index']);
        Route::post('admin/logo/create', [LogoController::class, 'create']);
        Route::get('admin/logo/details/{logo}', [LogoController::class, 'detail']);
        Route::post('admin/logo/update/{logo}', [LogoController::class, 'update']);
        Route::get('admin/logo/delete/{logo}', [LogoController::class, 'destroy']);
        Route::get('admin/logo/add', [LogoController::class, 'add']);

        // Admin Kategori
        Route::get('/admin/kategori', [KategoriController::class, 'index']);
        Route::post('admin/kategori/create', [KategoriController::class, 'create']);
        Route::get('admin/kategori/edit/{kategori}', [KategoriController::class, 'edit']);
        Route::post('admin/kategori/update/{kategori}', [KategoriController::class, 'update']);
        Route::get('admin/kategori/destroy/{kategori}', [KategoriController::class, 'destroy']);
        Route::get('admin/kategori/add', [KategoriController::class, 'add']);

        // Admin Pesan
        Route::get('/admin/pesan', [PesanController::class, 'index']);
        Route::get('admin/pesan/destroy/{pesan}', [PesanController::class, 'destroy']);
        Route::get('/admin/pesan/detail/{pesan}', [PesanController::class, 'detail']);

        // Admin Size
        Route::get('admin/size',[SizeController::class,'index']);
        Route::post('admin/size/create',[SizeController::class,'create']);
        Route::get('admin/size/details/{id}',[SizeController::class,'detail']);
        Route::post('admin/size/update/{id}',[SizeController::class,'update']);
        Route::get('admin/size/delete/{id}',[SizeController::class,'delete']);
        Route::get('admin/size/add/',[SizeController::class,'add']);

        // Admin Color
        Route::get('admin/color',[ColorController::class,'index']);
        Route::post('admin/color/create',[ColorController::class,'create']);
        Route::get('admin/color/details/{id}',[ColorController::class,'detail']);
        Route::post('admin/color/update/{id}',[ColorController::class,'update']);
        Route::get('admin/color/delete/{id}',[ColorController::class,'delete']);
        Route::get('admin/color/add/',[ColorController::class,'add']);

        // Admin Order
        Route::get('admin/order',[OrderAdminController::class,'index']);
        Route::get('admin/order/detail/{order}',[OrderAdminController::class,'detail']);
        Route::post('admin/order/detail/{order}',[OrderAdminController::class,'status']);

    });

    // Logout
    // Route::get('/lamanhome', [AuthController::class, 'home']);
    Route::get('/logout', [AuthController::class, 'destroy']);

    Route::get('/customer/keranjang', [DetailController::class, 'keranjang']);
    Route::post('/customer/detail/keranjang/{id}', [DetailController::class, 'pesan']);
    Route::get('/customer/detail/destroy/{id}', [DetailController::class, 'destroy']);
    
    Route::get('/customer/detail/checkout', [DetailController::class, 'checkout']);
    Route::get('/customer/checkout/view/{id}', [CheckoutController::class, 'index']);
    Route::get('/customer/checkout/province', [CheckoutController::class, 'province']);
    Route::get('/customer/checkout/city/{province}', [CheckoutController::class, 'city']);
    Route::post('/customer/checkout/cost', [CheckoutController::class, 'cost']);

    Route::post('/customer/checkout/selesai', [CheckoutController::class, 'selesai']);
    Route::get('/customer/checkout/riwayat', [RiwayatController::class, 'index']);
    Route::get('/customer/checkout/detailOrder/{id}', [RiwayatController::class, 'detail']);
    Route::get('/customer/checkout/bayar/{id}', [RiwayatController::class, 'bayar']);
    Route::post('/customer/checkout/kirim', [RiwayatController::class, 'kirim']);
    Route::get('/customer/checkout/download/{order}', [RiwayatController::class, 'download']);
    Route::get('/customer/checkout/lihat/{order}', [RiwayatController::class, 'view']);
                
});
