<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Obat as ObatResource;
use Illuminate\Http\Request;

class ObatRestController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $obat = Obat::all();
        return $this->sendResponse(
            ObatResource::collection($obat), 'Post fetched.'
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
    
            'nama_obat' => 'required',
            'stock' => 'required',
            'harga' => 'required',
            'tanggal_masuk' => 'required',
            'expired' => 'required',
            'no_batch' => 'required'
    
        ]);
    
        if($validator->fails()){
            return $this->sendError($validator->errors());
    
        }
        $obat = Obat::create($input);
    
    return $this->sendResponse(new ObatResource($obat), 'Post created.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $obat = Obat::find($id);
        if (is_null($obat)) {
            return $this->sendError('Post doesn\'t exist.');
        }
        return $this->sendResponse(new ObatResource($obat), 'Post fetched.');
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
    public function update(Request $request, Obat $obat)
    {
        //
        $input = $request->all();
        $validator = Validator::make($input, [
    
            'nama_obat' => 'required',
            'stock' => 'required',
            'harga' => 'required',
            'expired' => 'required',
            'tanggal_masuk' => 'required',
            'no_batch' => 'required'
    
        ]);
    
        if($validator->fails()){
            return $this->sendError($validator->errors());
    
        }

        $obat->nama_obat = $input['nama_obat'];
        $obat->stock = $input['stock'];
        $obat->harga = $input['harga'];
        $obat->expired = $input['expired'];
        $obat->tanggal_masuk = $input['tanggal_masuk'];
        $obat->no_batch = $input['no_batch'];
        $obat->update($input);

        return $this->sendResponse(new ObatResource($obat), 'Post updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obat $obat)
    {
        //
        $obat->delete();
        return $this->sendResponse([], 'Post deleted.');
    }
}
