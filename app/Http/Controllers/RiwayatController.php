<?php

namespace App\Http\Controllers;

use App\Models\Bayar;
use App\Models\User;
use App\Models\Order;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Contracts\View\View;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index(Request $request, Order $orders, User $user)
    {
        $orders = Order::where('user_id', session('id'))->get();
	
        return view('client.riwayat.riwayat', compact('orders'));
    }

    public function detail($order)
    {
        $order = Order::where('invoice', $order)->first();
        $pesanan = Pesanan::where('id_order', $order->id)->first();
        foreach($pesanan->pesananDetail as $pp){
            $pp->produk = Produk::find($pp->produk_id);
        }
        // dd($pesanan->order);
        
		return view('client.riwayat.detailOrder', compact('pesanan','order'));
    }

    public function bayar($id)
    {
        // $order = Order::where('user_id', session('id'))->get();
        $order = Order::where('invoice', $id)->first();
        return view('client.bayar.bayar', compact('order'));
    }

    public function kirim(Request $request)
    {
        $transaksi = Bayar::create([
            'id_invoice'=>$request->id_invoice,
            'nama_customer'=>$request->nama_customer,
            'gambar'=>$request->gambar,
        ]);
        
        return view('client.selesai.selesai', compact('transaksi'));
    }
    
    public function view($order)
    {
        $pesanan = Order::where('invoice', $order)->first();
        // $pesanan = Pesanan::where('id_order', $order->id)->first();
        // foreach($pesanan->pesananDetail as $pp){
        //     $pp->produk = Produk::find($pp->produk_id);
        // }
        // $pesanan = Order::findOrFail($order);

        return view('client.invoice.generate_invoice', compact('pesanan'));
    }

    public function download($order)
    {
        $pesanan = Order::where('invoice', $order)->first();

        $data = ['pesanan' => $pesanan];

        $pdf = Pdf::loadView('client.invoice.generate_invoice', $data);
        return $pdf->download('invoice'.$pesanan->invoice.'.pdf');
    }
}
