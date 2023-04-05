<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;

class OrderAdminController extends Controller
{
    public function index(Order $order)
    {
        $order = $order->all();

        $data = [
            'data' => $order,
        ];

        return view('admin.order.order', $data);
    }

    public function detail($order)
    {
        $order = Order::where('invoice', $order)->first();
        $pesanan = Pesanan::where('id_order', $order->id)->first();
        foreach($pesanan->pesananDetail as $pp){
            $pp->produk = Produk::find($pp->produk_id);
        }
        
        return view('admin.order.detailOrder', compact('pesanan', 'order'));
    }

    public function status(Request $request, $order)
    {
        $orders = Order::where('invoice', $order)->first();

        // dd($orders);

        if($orders)
        {
            $orders->update([
                'status' => $request->status
            ]);

            return redirect('admin/order/detail/'.$order)->with('message', 'Update Berhasil');

        } else {
            return redirect('admin/order/detail/'.$order)->with('message', 'Update Gagal');
        }
    }
}
