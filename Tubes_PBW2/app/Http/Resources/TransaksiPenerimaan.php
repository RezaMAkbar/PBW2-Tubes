<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransaksiPenerimaan extends JsonResource
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
            'no_nota' => $this->no_nota,
            'username' => $this->username,
            'tanggal' => $this->tanggal,
            'harga_beli' => $this->harga_beli,
            'total_harga' => $this->total_harga,
            'stock_masuk' => $this->stock_masuk,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
