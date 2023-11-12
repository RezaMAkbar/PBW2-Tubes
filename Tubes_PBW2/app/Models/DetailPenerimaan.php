<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenerimaan extends Model
{
    protected $table = 'detail_penerimaan';
    use HasFactory;
    protected $fillable = [
        'no_nota',
        'username',
        'tanggal',
        'harga_beli',
        'total_harga',
        'id_obat',
        'stock_masuk',
    ];
}
