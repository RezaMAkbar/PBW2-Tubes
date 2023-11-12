<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'path', 'id_obat'];

    public function obat() {
        return $this->belongsTo(Obat::class, 'id');
    }
}
