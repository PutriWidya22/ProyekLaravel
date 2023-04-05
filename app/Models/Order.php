<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $primaryKey = 'id';

    protected $fillable = [
        'invoice',
        'user_id',
        'nama_order',
        'no_hp',
        'subTotal',
        'destination',
        'address_detail',
        'courier',
        'service',
        'shipping',
        'subTotal',
        'total',
        'total_weight',
        'status',
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_order');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
