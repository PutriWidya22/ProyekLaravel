<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Kategori $kategori)
    {
        $kategori = $kategori->all();

        $data = [
            'data' => $kategori,
        ];

        return view('admin.kategori.kategori', $data);
    }

    public function add()
    {
        return view('admin.kategori.form');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Kategori $kategori)
    {
        $file = $request->file('gambar');
        $tujuanUpload = 'ImageUpload/';
        $nama_file = $file->getClientOriginalName();

        $finalName = date('YmdHis'). "-".$nama_file;

        $request->file('gambar')->storeAs($tujuanUpload, $finalName, 'public');

        $kategori->create([
            'id' => $request->id,
            'nama_kategori' => $request->nama_kategori,
            'gambar' => 'http://localhost:8000'.Storage::url('ImageUpload/'.$finalName),
        ]);

        if ($kategori) {
            echo "
            <script>
                alert('Kategori Berhasil Disimpan');
                location='/admin/kategori';
            </script>
            ";
        } else {
            return "Gagal Menyimpan Data";
        }
        echo "
        <script>  
            alert('Menyimpan Gambar Gagal');
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        $data = [
            'data' => $kategori,
        ];

        return view('admin.kategori.formEdit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $data = [
            'id' => $request->id,
            'nama_kategori' => $request->nama_kategori, 
        ];

        if($request->hasFile('gambar')){
            if(isset($kategori->gambar) && $kategori->gambar != ""){
                if(File::exists('storage/ImageUpload/'. $kategori->gambar)){
                    unlink('storage/ImageUpload/'. $kategori->gambar);
                }
            }

            $file = $request->file('gambar');
            $nama_file = $file->getClientOriginalName();

            $finalName = date('YmdHis'). "-".$nama_file;

            $request->file('gambar')->storeAs('ImageUpload/', $finalName, 'public');
            $data += ['gambar' => 'http://localhost:8000'.Storage::url('ImageUpload/'.$finalName)];
        }

        $kategori->update($data);

        if ($kategori) {
            echo "
            <script>
                alert('Kategori Berhasil Diubah');
                location='/admin/kategori';
            </script>
            ";
        } else {
            return "Gagal Ubah Data";
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
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        if(File::exists('storage/ImageUpload/'. $kategori->gambar)){
            unlink('storage/ImageUpload/'. $kategori->gambar);
        }

        $kategori->delete();

        if ($kategori) {
            echo "
            <script>
                alert('Kategori Berhasil Dihapus');
                location='/admin/kategori';
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
