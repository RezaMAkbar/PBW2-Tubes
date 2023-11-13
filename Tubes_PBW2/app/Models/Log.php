<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'log_transaksi';
    use HasFactory;
    protected $fillable = [
        'tipe',
        'id_obat'
    ];
}
