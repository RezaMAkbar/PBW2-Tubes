<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Resources\Obat as ObatResource;
use App\Http\Resources\TransaksiPenerimaan as TerimaResource;

class StokOpname extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'stok_opname';
    protected $fillable = [
        'id_obat',
        'tempat_simpan',
        'tanggal_simpan',
        'sisa_stock',
        'keterangan',
        'stok_keluar'
    ];
    public function stokOpname()
{
    return $this->belongsTo(StokOpname::class, 'id', 'id_obat');
}

public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id');
    }

    public function detailPenerimaan()
    {
        return $this->belongsTo(DetailPenerimaan::class, 'id_obat', 'id_obat');
    }
}
