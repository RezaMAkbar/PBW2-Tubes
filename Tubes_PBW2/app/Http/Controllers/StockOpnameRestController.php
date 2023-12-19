<?php

namespace App\Http\Controllers;

use App\Models\StokOpname;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\StockOpname as OpnameResource;
use App\Models\LogTransaksi;
use Illuminate\Http\Request;

class StockOpnameRestController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $opname = StokOpname::with(['obat:id,nama_obat,no_batch', 'detailPenerimaan:id_obat,no_nota'])
        ->orderBy('id_obat', 'desc')
        ->get();

    $processed = $opname->map(function ($item) {
        $id = $item->id;
        $idObat = $item->id_obat;
        $tempatSimpan = $item->tempat_simpan;
        $tanggalSimpan = $item->tanggal_simpan;
        $sisaStock = $item->sisa_stock;
        $keterangan = $item->keterangan;
        $stokKeluar = $item->stok_keluar;

        $obatData = $item->obat; // Access columns from Obat
        $detailPenerimaanData = $item->detailPenerimaan; // Access columns from DetailPenerimaan

        return [
            'id' => $id,
            'id_obat' => $idObat,
            'tempat_simpan' => $tempatSimpan,
            'tanggal_simpan' => $tanggalSimpan,
            'stok_keluar' => $stokKeluar,
            'sisa_stock' => $sisaStock,
            'keterangan' => $keterangan,
            'obat_data' => [
                'nama_obat' => $obatData->nama_obat ?? null,
                'no_batch' => $obatData->no_batch ?? null,
            ],
            'detail_penerimaan_data' => [
                'no_nota' => optional($detailPenerimaanData)->no_nota,
            ],
        ];
    });

    return $this->sendResponse($processed, 'Posts fetched.');
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $validator = Validator::make($input, [
    
            'id_obat' => 'required',
            'tempat_simpan'=> 'required',
            'tanggal_simpan' => 'required',
            'stok_keluar' => 'required',
            'sisa_stock' => 'required',
            'keterangan'=> 'required',
    
        ]);
    
        if($validator->fails()){
            return $this->sendError($validator->errors());
    
        }
        $opname = StokOpname::create($input);
    
    return $this->sendResponse(new OpnameResource($opname), 'Post created.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $opname = StokOpname::with(['obat:id,nama_obat,no_batch', 'detailPenerimaan:id_obat,no_nota'])->find($id);
    
        if (is_null($opname)) {
            return $this->sendError('Post doesn\'t exist.');
        }
    
        $idObat = $opname->id_obat;
        $tempatSimpan = $opname->tempat_simpan;
        $tanggalSimpan = $opname->tanggal_simpan;
        $sisaStock = $opname->sisa_stock;
        $stokKeluar = $opname->stok_keluar;
        $keterangan = $opname->keterangan;
    
        $obatData = optional($opname->obat)->only(['nama_obat', 'no_batch']);
        $detailPenerimaanData = optional($opname->detailPenerimaan)->only(['no_nota']);
    
        $processed = [
            'id_obat' => $idObat,
            'tempat_simpan' => $tempatSimpan,
            'tanggal_simpan' => $tanggalSimpan,
            'stok_keluar' => $stokKeluar,
            'sisa_stock' => $sisaStock,
            'keterangan' => $keterangan,
            'obat_data' => $obatData,
            'detail_penerimaan_data' => $detailPenerimaanData,
        ];
    
        return $this->sendResponse($processed, 'Post fetched.');
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StokOpname $opname)
    {
        //
        $input = $request->all();
        $validator = Validator::make($input, [
    
            'id_obat' => 'sometimes|required',
            'tempat_simpan'=> 'required',
            'tanggal_simpan' => 'required',
            'stok_keluar' => 'required',
            'sisa_stock' => 'required',
            'keterangan'=> 'required',
    
        ]);
    
        if($validator->fails()){
            return $this->sendError($validator->errors());
    
        }

        $opname->id_obat = $input['id_obat'];
        $opname->tempat_simpan = $input['tempat_simpan'];
        $opname->tanggal_simpan = $input['tanggal_simpan'];
        $opname->stok_keluar = $input['stok_keluar'];
        $opname->sisa_stock = $input['sisa_stock'];
        $opname->keterangan = $input['keterangan'];
        $opname->update($input);

        return $this->sendResponse(new OpnameResource($opname), 'Post updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StokOpname $opname)
    {
        //
        $opname->delete();
        return $this->sendResponse([], 'Post deleted.');
    }
}
