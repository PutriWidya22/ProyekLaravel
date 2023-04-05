<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'pesan';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id',
        'firstname',
        'lastname',
        'email',
        'message',
    ];
}
