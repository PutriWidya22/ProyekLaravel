<?php

namespace App\Http\Controllers;

use App\Models\Bayar;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Bayar $logo)
    {
        $logoData = $logo->all();

        $data = [
            'data' => $logoData ,
        ];

        return view('admin.logo.logo', $data);
    }

    // public function add()
    // {
    //     return view('admin.logo.form');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create(Request $request, Logo $logo)
    // {
    //     $file = $request->file('img_logo');
    //     $tujuanUpload = 'ImageUpload/';
    //     $nama_file = $file->getClientOriginalName();

    //     $finalName = date('YmdHis'). "-".$nama_file;

    //     $request->file('img_logo')->storeAs($tujuanUpload, $finalName, 'public');

    //     $logo->create([
    //         'id' => $request->id,
    //         'img_logo' => 'http://localhost:8000'.Storage::url('ImageUpload/'.$finalName),
    //     ]);

    //     if($logo){
    //         return redirect('/admin/logo');
    //     }else{
    //         return 'Gagal Input Data';
    //     }
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */

    //  public function detail(Logo $logo)
    //  {
    //      $data = [
    //          'data' => $logo,
    //      ];
 
    //      return view('admin.logo.formEdit', $data);
    //  }

    // public function update(Request $request, Logo $logo)
    // {
    //     $data = [
    //         'id' => $request->id,
    //     ];

    //     if($request->hasFile('img_logo')){
    //         if(isset($logo->img_logo) && $logo->img_logo != ""){
    //             if(File::exists('storage/ImageUpload/'. $logo->img_logo)){
    //                 unlink('storage/ImageUpload/'. $logo->img_logo);
    //             }
    //         }

    //         $file = $request->file('img_logo');
    //         $nama_file = $file->getClientOriginalName();

    //         $finalName = date('YmdHis'). "-".$nama_file;

    //         $request->file('img_logo')->storeAs('ImageUpload/', $finalName, 'public');
    //         $data += ['img_logo' => 'http://localhost:8000'.Storage::url('ImageUpload/'.$finalName)];
    //     }

    //     $logo->update($data);

    //     if($logo){
    //         return redirect('/admin/logo');
    //     }else{
    //         return 'Gagal Menguubah Data';
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Logo $logo)
    // {
    //     if(File::exists('storage/ImageUpload/'. $logo->img_logo)){
    //         unlink('storage/ImageUpload/'. $logo->img_logo);
    //     }
        
    //     $logo->delete();

    //     if ($logo) {
    //         return redirect('/admin/logo');
    //     } else {
    //         return "error";
    //     }
    // }
}
