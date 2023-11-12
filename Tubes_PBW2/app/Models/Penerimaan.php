<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    protected $table = 'penerimaan';
    use HasFactory;
    protected $fillable = [
        'no_nota',
        'username',
        'tanggal',
        'stock_masuk',
        'harga_beli'
    ];

}
