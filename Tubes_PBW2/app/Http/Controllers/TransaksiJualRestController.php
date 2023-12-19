<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TransaksiPenjualan as JualResource;
use App\Models\LogTransaksi;
use Illuminate\Http\Request;

class TransaksiJualRestController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $jual = Penjualan::all();
        return $this->sendResponse(
            JualResource::collection($jual), 'Post fetched.'
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
            'total_harga' => 'required',
            'total_barang' => 'required',
            'tanggal_transaksi' => 'required'
    
        ]);
    
        if($validator->fails()){
            return $this->sendError($validator->errors());
    
        }
        $jual = Penjualan::create($input);

        $id_penjualan = $jual->id;

       
        $logTransaksi = [
            'id_obat' => $input['id_obat'],
            'tipe' => 'penjualan',
            'id_penjualan' => $id_penjualan,
        ];

    LogTransaksi::create($logTransaksi);
    
    return $this->sendResponse(new JualResource($jual), 'Post created.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $jual = Penjualan::find($id);
        if (is_null($jual)) {
            return $this->sendError('Post doesn\'t exist.');
        }
        return $this->sendResponse(new JualResource($jual), 'Post fetched.');
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
    public function update(Request $request, Penjualan $jual)
    {
        //
        $input = $request->all();
        $validator = Validator::make($input, [
    
            'id_obat' => 'required',
            'username' => 'required',
            'total_harga' => 'required',
            'total_barang' => 'required',
            'tanggal_transaksi' => 'required'
    
        ]);
    
        if($validator->fails()){
            return $this->sendError($validator->errors());
    
        }

        $jual->id_obat = $input['id_obat'];
        $jual->username = $input['username'];
        $jual->total_barang = $input['total_barang'];
        $jual->total_harga = $input['total_harga'];
        $jual->tanggal_transaksi = $input['tanggal_transaksi'];
        $jual->update($input);

        return $this->sendResponse(new JualResource($jual), 'Post updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $jual)
    {
        //
        $jual->delete();
        return $this->sendResponse([], 'Post deleted.');
    }
}