<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    public function images() {
        return $this->hasMany(Image::class, 'id_obat');
    }
    protected $table = 'obat';
    use HasFactory;
    protected $fillable = [
        'nama_obat',
        'stock',
        'harga',
        'tanggal_masuk',
        'expired',
        'no_batch'
    ];
}
