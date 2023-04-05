<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayar extends Model
{
    use HasFactory;

    protected $table = 'bayar';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id',
        'id_invoice',
        'nama_customer',
        'gambar',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'no_invoice');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'nama_customer');
    }


}
