<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Obat extends Model
{
    public function images() {
        return $this->hasMany(Image::class, 'id_obat');
    }
    protected $table = 'obat';
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'nama_obat',
        'stock',
        'harga',
        'tanggal_masuk',
        'expired',
        'no_batch'
    ];

    public function stokOpnames()
    {
        return $this->hasMany(StokOpname::class, 'id_obat', 'id');
    }

    public function logTransaksi()
    {
        return $this->hasMany(LogTransaksi::class, 'id_obat', 'id');
    }
}
