<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Repositories\CrudRepositories;


class ProdukController extends Controller
{
    protected $product;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Produk $produk)
    {
        $produk = $produk->all();

        foreach($produk as $p){
            $p->id_kategori = Kategori::find($p->id_kategori)->nama_kategori;
            $p->id_ukuran = Size::find($p->id_ukuran)->size;
            $p->id_warna = Color::find($p->id_warna)->color;
        }

        $data = [
            'data' => $produk,
        ];

        return view('admin.produk.produk', $data);
    }

    public function add()
    {
        $kategori = Kategori::all();
        $color = Color::all();
        $size = Size::all();
        return view('admin.produk.form', compact('kategori','color','size'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Produk $produk)
    {
        $file = $request->file('gambar');
        $tujuanUpload = 'ImageUpload/';
        $nama_file = $file->getClientOriginalName();

        $finalName = date('YmdHis'). "-".$nama_file;

        $request->file('gambar')->storeAs($tujuanUpload, $finalName, 'public');

        $produk->create([
            'id' => $request->id,
            'nama_produk' => $request->nama_produk,
            'id_kategori' => $request->id_kategori,
            'id_warna' => $request->id_warna,
            'id_ukuran' => $request->id_ukuran,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'gambar' => 'http://localhost:8000'.Storage::url('ImageUpload/'.$finalName),
        ]);

        // if($produk){
        //     return redirect('/admin/produk');
        // }else{
        //     return 'Gagal Input Data';
        // }

        if ($produk) {
            echo "
            <script>
                alert('Produk Berhasil Ditambah');
                location='/admin/produk';
            </script>
            ";
        } else {
            return "Gagal Menambah Data";
        }
        echo "
        <script>
            alert('Tambah Gambar Gagal');
        </script>
        ";
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

    public function detail(Produk $produk)
    {
        $data = [
            'data' => $produk,
            'kategori' => Kategori::all(),
            'color' => Color::all(),
            'size' => Size::all(),
        ];
        
        return view('admin.produk.formEdit', $data);
        

        // return view('admin.produk.formEdit', $data);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $data = [
            'id' => $request->id,
            'nama_produk' => $request->nama_produk,
            'id_kategori' => $request->id_kategori,
            'id_warna' => $request->id_warna,
            'id_ukuran' => $request->id_ukuran,
            'stok' => $request->stok,
            'harga' => $request->harga
        ];

        if($request->hasFile('gambar')){
            if(isset($produk->gambar) && $produk->gambar != ""){
                if(File::exists('storage/ImageUpload/'. $produk->gambar)){
                    unlink('storage/ImageUpload/'. $produk->gambar);
                }
            }

            $file = $request->file('gambar');
            $nama_file = $file->getClientOriginalName();

            $finalName = date('YmdHis'). "-".$nama_file;

            $request->file('gambar')->storeAs('ImageUpload/', $finalName, 'public');
            $data += ['gambar' => 'http://localhost:8000'.Storage::url('ImageUpload/'.$finalName)];
        }

        $produk->update($data);

        // if($produk){
        //     return redirect('/admin/produk');
        // }else{
        //     return 'Gagal Menguubah Data';
        // }

        if ($produk) {
            echo "
            <script>
                alert('Produk Berhasil Diubah');
                location='/admin/produk';
            </script>
            ";
        } else {
            return "Gagal Mengubah Data";
        }
        echo "
        <script>
            alert('Ubah Gambar Gagal');
        </script>
        ";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function delete(Produk $produk)
    {
        if(File::exists('storage/ImageUpload/'. $produk->gambar)){
            unlink('storage/ImageUpload/'. $produk->gambar);
        }
        
        $produk->delete();

        if ($produk) {
            echo "
            <script>
                alert('Produk Berhasil Dihapus');
                location='/admin/produk';
            </script>
            ";
        } else {
            return "Gagal Hapus Data";
        }
        echo "
        <script>
            alert('Hapus Gambar Gagal');
        </script>
        ";
    }

}
