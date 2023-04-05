<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;

    protected $table = 'logo';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id',
        'img_logo'
    ];
}
