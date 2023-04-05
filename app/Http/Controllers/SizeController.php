<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;
use Illuminate\Support\Facades\Validator;


class SizeController extends Controller
{
    public function index(Size $pembelian)
    {
        $pembelianData = $pembelian->all();

        $data = [
            'data' => $pembelianData ,
        ];

        return view('admin.ukuran.ukuran', $data);
    }

    public function add()
    {
        return view('admin.ukuran.form');
    }

    public function create(Request $request, Size $pembelian)
    {
        $validator = Validator::make($request->all(), [
            'id' => '',
            'size' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()
            ],422);
        }

        $pembelian->create([
            'id' => $request->id,
            'size' => $request->size,
        ]);

        if($pembelian){
            return redirect('/admin/size');
        }else{
            return 'Gagal Input Data';
        }
    }

    public function detail(Size $pembelian)
    {
        $data = [
            'data' => $pembelian,
        ];

        return view('admin.ukuran.formEdit', $data);
    }

    public function update(Request $request, Size $pembelian)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'size' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()
            ],422);
        }

        $pembelian->update([
            'id' => $request->id,
            'size' => $request->size,
        ]);

        if($pembelian){
            return redirect('/admin/size');
        }else{
            return 'Gagal Menguubah Data';
        }
    }

    public function delete(Size $id)
    {
        $id->delete();

        if ($id) {
            return redirect('/admin/size');
        } else {
            return "error";
        }
    }

}
