<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    use HasFactory;
    protected $fillable = ['id_produk','id_user','stok'];

    public function Product()
    {
        return $this->belongsTo(Produk::class,'id_produk');
    }

    public function getTotalPricePerProductAttribute()
    {
        $price = $this->stok * $this->Produk->harga;
        return $price;
    }

    public function getTotalWeightPerProductAttribute()
    {
        $weight = $this->stok * $this->Produk->berat;
        return $weight;
    }

}
