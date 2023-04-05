<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;
	protected $table = 'pesanan_details';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id',
        'produk_id',
        'pesanan_id',
        'jumlah',
        'jumlah_harga',
    ];

    public function produk()
	{
	      return $this->belongsTo(Produk::class,'produk_id');
	}

	// public function pesanan()
	// {
	//       return $this->belongsTo(Pesanan::class,'pesanan_id');
	// }
}
