<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'colors';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id',
        'color',
        
    ];

    public function produk() {
        return $this->hasMany(Produk::class, 'id_warna', 'id');
    }
}
