<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::where('user_id', session('id'))->where('id_order', 0)->first();
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();


        return view('client.checkout.checkout', compact('pesanan', 'pesanan_details'));
    }


    public function province()
    {
        // echo 'coba dulu';
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: a1e2a2253847df3adc7ea3cb27c0eee7"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            // echo "cURL Error #:" . $err;
            return response()->json(['error' => $err], 400); 
        } else {
            // echo $response;
            return response()->json(['province' => $response], 200);
        }
    }

    public function city($province)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $province,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: a1e2a2253847df3adc7ea3cb27c0eee7"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            // echo "cURL Error #:" . $err;
            return response()->json(['error' => $err], 400); 

        } else {
            // echo $response;
            return response()->json(['city' => $response], 200);
        }
    }

    public function cost(Request $request)
    {
        $content = $request->getContent();
        $data = json_decode($content);
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "origin=39&destination=".$data->city."&weight=300&courier=".$data->courier,
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: a1e2a2253847df3adc7ea3cb27c0eee7"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);

        if ($err) {
            // echo "cURL Error #:" . $err;
            return response()->json(['error' => $err], 400); 
        } else {
            // echo $response;
            return response()->json(['cost' => $response], 200);
        }
    }

    public function selesai(Request $request)
    {
        $order = Order::create([
            'invoice' => 'PUT - ' . Date('Ymdhi'),
            'nama_order' => $request->nama_order,
            'no_hp' => $request->no_hp,
            'subTotal' => $request->subTotal,
            'destination' => $request->city. ', ' . $request->province,
            'address_detail' => $request->address_detail,
            'courier' => $request->courier,
            'service' => $request->service,
            'shipping' => $request->shipping,
            'subTotal' => $request->subTotal,
            'total' => $request->total,
            'total_weight' => 0,
            'status' => 'Menunggu Pembayaran',
            'user_id' => session('id')
        ]);

        if($order){
            $where = [
                'user_id' => $order->user_id, 
                'id_order' => 0
            ];

            Pesanan::where($where)->update(['id_order' => $order->id]);
        }

        return view('client.selesai.selesai');
    }

    
}
