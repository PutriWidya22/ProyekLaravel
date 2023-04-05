<?php

namespace App\Http\Controllers;

use App\Models\CustProduct;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class CustProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produk::paginate(20);
        return view('client.product.product', compact('data'));
    }

    public function viewcategory($id){

       if(Kategori::where('id',$id)->exists())
       {
            $kategori = Kategori::where('id',$id)->first();
            $produk = Produk::where('id_kategori',$kategori->id)->get();

            return view('client.home.productcategory', compact('kategori', 'produk'));

       } else {
            return redirect('customer/product/viewcategory'.$id);
       }
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
     * @param  \App\Models\CustProduct  $custProduct
     * @return \Illuminate\Http\Response
     */
    public function show(CustProduct $custProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustProduct  $custProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(CustProduct $custProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustProduct  $custProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustProduct $custProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustProduct  $custProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustProduct $custProduct)
    {
        //
    }
}
