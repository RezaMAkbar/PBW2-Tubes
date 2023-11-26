<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogTransaksi extends Model
{
    protected $table = 'log_transaksi';
    use HasFactory;
    protected $fillable = [
        'tipe',
        'id_obat',
        'id_penerimaan',
        'id_penjualan',
    ];

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id');
    }

    public function detailPenerimaan()
    {
        return $this->belongsTo(DetailPenerimaan::class, 'id_obat', 'id_obat');
    }

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'id_obat', 'id_obat');
    }
}
