<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LogTransaksi extends JsonResource
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
            'id_penerimaan' => $this->id_penerimaan,
            'id_penjualan' => $this->id_penjualan,
            'tipe' => $this->tipe,
        ];
    }
}
