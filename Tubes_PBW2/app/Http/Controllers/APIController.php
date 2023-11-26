<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIController extends Controller
{
    public function memanggilAPIUser() {

        //token bearer
        $token = "2|BNloMOrpMojdEWmSJvyVmIvaB1H3Gf2iAnDEL1jMb8bdfb08";
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$token
        ])
        ->get('http://localhost:8000/api/getAllUsersToo');
        $jsonData = $response->json();
        return response()->json($jsonData, $response->getStatusCode());
        
    }

    public function memanggilAPIObat() {

        //token bearer
        $token = "2|BNloMOrpMojdEWmSJvyVmIvaB1H3Gf2iAnDEL1jMb8bdfb08";
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$token
        ])
        ->get('http://localhost:8000/api/getAllObatToo');
        $jsonData = $response->json();
        return response()->json($jsonData, $response->getStatusCode());
        
    }

    public function memanggilAPIStockOpname() {

        //token bearer
        $token = "2|BNloMOrpMojdEWmSJvyVmIvaB1H3Gf2iAnDEL1jMb8bdfb08";
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$token
        ])
        ->get('http://localhost:8000/api/getAllStockOpnameToo');
        $jsonData = $response->json();
        return response()->json($jsonData, $response->getStatusCode());
        
    }

    public function memanggilAPIDetailPenerimaan() {

        //token bearer
        $token = "2|BNloMOrpMojdEWmSJvyVmIvaB1H3Gf2iAnDEL1jMb8bdfb08";
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$token
        ])
        ->get('http://localhost:8000/api/getAllDetailPenerimaanToo');
        $jsonData = $response->json();
        return response()->json($jsonData, $response->getStatusCode());
        
    }

    public function memanggilAPIPenjualan() {

        //token bearer
        $token = "2|BNloMOrpMojdEWmSJvyVmIvaB1H3Gf2iAnDEL1jMb8bdfb08";
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$token
        ])
        ->get('http://localhost:8000/api/getAllDetailPenjualanToo');
        $jsonData = $response->json();
        return response()->json($jsonData, $response->getStatusCode());
        
    }

    public function memanggilAPILogTransaksi() {

        //token bearer
        $token = "2|BNloMOrpMojdEWmSJvyVmIvaB1H3Gf2iAnDEL1jMb8bdfb08";
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$token
        ])
        ->get('http://localhost:8000/api/getAllDetailLogToo');
        $jsonData = $response->json();
        return response()->json($jsonData, $response->getStatusCode());
        
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
