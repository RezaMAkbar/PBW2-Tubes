<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransaksiPenjualan extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'id_obat' => $this->id_obat,
            'username' => $this->username,
            'tanggal_transaksi' => $this->tanggal_transaksi,
            'total_harga' => $this->total_harga,
            'total_barang' => $this->total_barang,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
