<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';
    use HasFactory;
    protected $fillable = [
        'username',
        'tanggal_transaksi',
        'total_harga',
        'id_obat',
        'total_barang'
    ];

}
