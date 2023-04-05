<?php

namespace App\Models;

use App\Models\ProdukImage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id',
        'nama_produk',
        'id_kategori',
        'id_warna',
        'id_ukuran',
        'harga',
        'stok',
        'gambar',
        
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }

    // public function produkImages(){
    //     return $this->hasMany(ProdukImage::class, 'produk_id', 'id');
    // }

    public function colors(){
        return $this->belongsTo(Color::class, 'id_warna', 'id');
    }

    public function size(){
        return $this->belongsTo(Size::class, 'id_ukuran', 'id');
    }
}
