<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Obat extends JsonResource
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
            'nama_obat' => $this->nama_obat,
            'stock' => $this->stock,
            'harga' => $this->harga,
            'expired' => $this->expired,
            'tanggal_masuk' => $this->tanggal_masuk,
            'no_batch' => $this->no_batch,
            
           
        ];
    }
}
