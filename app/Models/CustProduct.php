<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustProduct extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id',
        'nama_produk',
        'id_kategori',
        'warna',
        'ukuran',
        'stok',
        'harga',
        'gambar'
    ];
}
