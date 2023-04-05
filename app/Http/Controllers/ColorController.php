<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use Illuminate\Support\Facades\Validator;

class ColorController extends Controller
{
    public function index(Color $pembelian)
    {
        $pembelianData = $pembelian->all();

        $data = [
            'data' => $pembelianData ,
        ];

        return view('admin.warna.warna', $data);
    }

    public function add()
    {
        return view('admin.warna.form');
    }

    public function create(Request $request, Color $pembelian)
    {
        $validator = Validator::make($request->all(), [
            'id' => '',
            'color' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()
            ],422);
        }

        $pembelian->create([
            'id' => $request->id,
            'color' => $request->color
        ]);

        if($pembelian){
            return redirect('/admin/color');
        }else{
            return 'Gagal Input Data';
        }
    }

    public function detail(Color $pembelian)
    {
        $data = [
            'data' => $pembelian,
        ];

        return view('admin.warna.formEdit', $data);
    }

    public function update(Request $request, Color $pembelian)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'color' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()
            ],422);
        }

        $pembelian->update([
            'id' => $request->id,
            'color' => $request->color
        ]);

        if($pembelian){
            return redirect('/admin/color');
        }else{
            return 'Gagal Menguubah Data';
        }
    }

    public function delete(Color $id)
    {
        $id->delete();

        if ($id) {
            return redirect('/admin/color');
        } else {
            return "error";
        }
    }
}
