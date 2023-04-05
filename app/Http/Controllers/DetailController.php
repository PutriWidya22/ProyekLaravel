<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Kategori;
use App\Models\Color;
use App\Models\Size;
use App\Repositories\CrudRepositories;
use App\Models\Cart;
use App\Services\Feature\CartService;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $produk = Produk::where('id', $id)->first();

        return view('client.detail.detail', compact('produk'));
    }

    public function pesan(Request $request, $id) {

        $produk = Produk::where('id', $id)->first();
        $tanggal = Carbon::now();

        //validasi apakah melebihi stok
        if($request->jumlah_pesan > $produk->stok)
        {
            
        
            return redirect('/customer/detail/view/'.$id);
                
        }

        // cek validasi
        $cek_pesanan = Pesanan::where('user_id', session('id'))->where('id_order',0)->first();

        //simpan ke database pesanan
        if(empty($cek_pesanan))
        {
            $pesanan = new Pesanan;
	    	$pesanan->user_id = session('id');
	    	$pesanan->tanggal = $tanggal;
	    	$pesanan->id_order = 0;
	    	$pesanan->jumlah_harga = 0;
            // $pesanan->kode = mt_rand(100, 999);
	    	$pesanan->save();

        }
        
        //simpan ke database pesanan detail
    	$pesanan_baru = Pesanan::where('user_id', session('id'))->where('id_order',0)->first();

    	//cek pesanan detail
    	$cek_pesanan_detail = PesananDetail::where('produk_id', $produk->id)->where('pesanan_id', $pesanan_baru->id)->first();
    	if(empty($cek_pesanan_detail))
    	{
    		$pesanan_detail = new PesananDetail;
	    	$pesanan_detail->produk_id = $produk->id;
	    	$pesanan_detail->pesanan_id = $pesanan_baru->id;
	    	$pesanan_detail->jumlah = $request->jumlah_pesan;
	    	$pesanan_detail->jumlah_harga = intval($produk->harga)*intval($request->jumlah_pesan);
	    	$pesanan_detail->save();
    	}else 
    	{
    		$pesanan_detail = PesananDetail::where('produk_id', $produk->id)->where('pesanan_id', $pesanan_baru->id)->first();

    		$pesanan_detail->jumlah = $pesanan_detail->jumlah+$request->jumlah_pesan;

    		//harga sekarang
    		$harga_pesanan_detail_baru = intval($produk->harga)*intval($request->jumlah_pesan);
	    	$pesanan_detail->jumlah_harga = intval($pesanan_detail->jumlah_harga)+intval($harga_pesanan_detail_baru);
	    	$pesanan_detail->update();
    	} 

        //jumlah total
    	$pesanan = Pesanan::where('user_id', session('id'))->where('id_order',0)->first();
    	$pesanan->jumlah_harga = intval($pesanan->jumlah_harga)+intval($produk->harga)*intval($request->jumlah_pesan);
    	$pesanan->update();
    	
        // Alert::success('Pesanan Sukses Masuk Keranjang', 'Success');
    	return redirect('/customer/detail/view/'.$id);
        
    }

    public function keranjang()
    {
        $pesanan = Pesanan::where('user_id', session('id'))->where('id_order',0)->first();
 	    $pesanan_details = [];
        if(!empty($pesanan))
        {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();

        }
        
        return view('client.keranjang.keranjang', compact('pesanan', 'pesanan_details'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(Detail $detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesanan_detail = PesananDetail::where('id', $id)->first();

        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();

        $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;

        $pesanan_detail->delete();

        if($pesanan->jumlah_harga === 0)
        {
            $pesanan->delete();
            return redirect('/customer/product');
        }else{
            $pesanan->update();
            return redirect('/customer/keranjang');
        }

        // Alert::error('Pesanan Sukses Dihapus', 'Hapus');
    }

}
