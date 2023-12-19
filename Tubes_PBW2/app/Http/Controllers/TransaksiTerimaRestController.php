<?php

namespace App\Http\Controllers;

use App\Models\DetailPenerimaan;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TransaksiPenerimaan as TerimaResource;
use App\Models\LogTransaksi;
use Illuminate\Http\Request;

class TransaksiTerimaRestController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $terima = DetailPenerimaan::all();
        return $this->sendResponse(
            TerimaResource::collection($terima), 'Post fetched.'
        );
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
            'username' => 'required',
            'stock_masuk' => 'required',
            'harga_beli' => 'required',
            'total_harga' => 'required',
            'tanggal' => 'required',
            'no_nota' => 'required'
    
        ]);
    
        if($validator->fails()){
            return $this->sendError($validator->errors());
    
        }
        $terima = DetailPenerimaan::create($input);

        $id_penerimaan = $terima->id;

       
        $logTransaksi = [
            'id_obat' => $input['id_obat'],
            'tipe' => 'penerimaan',
            'id_penerimaan' => $id_penerimaan,
        ];

    LogTransaksi::create($logTransaksi);
    
    return $this->sendResponse(new TerimaResource($terima), 'Post created.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $terima = DetailPenerimaan::find($id);
        if (is_null($terima)) {
            return $this->sendError('Post doesn\'t exist.');
        }
        return $this->sendResponse(new TerimaResource($terima), 'Post fetched.');
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
    public function update(Request $request, DetailPenerimaan $terima)
    {
        //
        $input = $request->all();
        $validator = Validator::make($input, [
    
            'id_obat' => 'required',
            'username' => 'required',
            'stock_masuk' => 'required',
            'harga_beli' => 'required',
            'total_harga' => 'required',
            'tanggal' => 'required',
            'no_nota' => 'required'
    
        ]);
    
        if($validator->fails()){
            return $this->sendError($validator->errors());
    
        }

        $terima->id_obat = $input['id_obat'];
        $terima->username = $input['username'];
        $terima->stock_masuk = $input['stock_masuk'];
        $terima->harga_beli = $input['harga_beli'];
        $terima->total_harga = $input['total_harga'];
        $terima->tanggal = $input['tanggal'];
        $terima->no_nota = $input['no_nota'];
        $terima->update($input);

        return $this->sendResponse(new TerimaResource($terima), 'Post updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailPenerimaan $terima)
    {
        //
        $terima->delete();
        return $this->sendResponse([], 'Post deleted.');
    }
}