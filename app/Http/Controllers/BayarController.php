<?php

namespace App\Http\Controllers;

use App\Models\Bayar;
use App\Models\Order;
use App\Models\User;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class BayarController extends Controller
{
    public function index(Request $request, Order $order, User $user)
    {
        // $bayar = Bayar::where('user_id', session('id'))->where('nama_customer', 0)->first();
        // $pesanan = Order::where('invoice')->get();
        $order = Order::where('user_id', session('id'))->get();

        return view('client.bayar.bayar', compact('order'));
    }
}
