<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id',
        'user_id',
        'tanggal',
        'id_order',
        'jumlah_harga',
    ];


    public function user()
	{
	      return $this->belongsTo(User::class, 'user_id');
	}

	public function pesananDetail() 
	{
	     return $this->hasMany(PesananDetail::class, 'pesanan_id');
	}

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }

    public function bayar()
    {
        return $this->belongsTo(Bayar::class, 'id_order');
    }
}
