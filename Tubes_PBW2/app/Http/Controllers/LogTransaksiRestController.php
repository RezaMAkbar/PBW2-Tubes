<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\LogTransaksi as LogTransaksiResource;
use App\Models\LogTransaksi;

class LogTransaksiRestController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $logTransaksi = LogTransaksi::all();
        return $this->sendResponse(
            LogTransaksiResource::collection($logTransaksi), 'Post fetched.'
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
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $logTransaksi = LogTransaksi::find($id);
        if (is_null($logTransaksi)) {
            return $this->sendError('Post doesn\'t exist.');
        }
        return $this->sendResponse(new LogTransaksiResource($logTransaksi), 'Post fetched.');
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
    public function update(Request $request, LogTransaksi $logTransaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LogTransaksi $logTransaksi)
    {
        //
        $logTransaksi->delete();
        return $this->sendResponse([], 'Post deleted.');
    }
}