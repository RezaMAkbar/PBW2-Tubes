<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Obat as ObatResource;
use App\Http\Resources\TransaksiPenerimaan as TerimaResource;

class StockOpname extends JsonResource
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
            'tempat_simpan' => $this->tempat_simpan,
            'tanggal_simpan' => $this->tanggal_simpan,
            'sisa_stock' => $this->sisa_stock,
            'keterangan' => $this->keterangan,
            'stok_keluar' => $this->stok_keluar,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'obat' => new ObatResource($this->whenLoaded('obat')),
            'detail_penerimaan' => new TerimaResource($this->whenLoaded('detail_penerimaan')),
        ];
    }
}
