<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pesan $pesan)
    {
        $pesanData = $pesan->all();

        $data = [
            'data' => $pesanData,
        ];

        return view('admin.pesan.pesan', $data);
    }

    public function detail(Pesan $pesan) 
    {
        // $pesan = Pesan::where('id', $id)->first();

        // return view('admin.pesan.DetailPesan', compact('pesan'));

        $data = [
            'data' => $pesan,

        ];
            return view('admin.pesan.DetailPesan', $data);
        
        
    }

    // public function add()
    // {
    //     return view('admin.pesan.form');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Pesan $pesan)
    {

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
     * @param  \App\Models\Pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function show(Pesan $pesan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesan $pesan)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesan $pesan)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesan $pesan)
    {
        // $pesan->delete();

        // if ($pesan) {
        //     echo "
        //     <script>
        //         alert('Pesan Berhasil Dihapus');
        //         location='/admin/pesan';
        //     </script>
        //     ";
        // } else {
        //     return "Gagal Hapus Pesan";
        // }
    }
}
