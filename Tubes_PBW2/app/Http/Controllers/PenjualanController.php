<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
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
        $usernames = User::pluck('username')->toArray(); //fetch username from users
        $obatIds = Obat::pluck('id');
        $obatNames = Obat::pluck('nama_obat');
        return view("transaksi.transaksiObat")->with(['usernames' => $usernames, 'obatIds' => $obatIds,  'obatNames' => $obatNames]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'usernamePenjualan' => ['required', 'string'],
            'tanggal_transaksi' => ['required', 'date'],
            'total_harga_penjualan' => ['required', 'integer'],
            'id_obat' => ['required', 'integer'],
            'total_barang' => ['required', 'integer'],
        ]);
    
       
        Penjualan::create([
            'username' => $request->usernamePenjualan,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'total_harga' => $request->total_harga_penjualan,
            'id_obat' => $request->id_obat,
            'total_barang' => $request->total_barang,
        ]);
    
        
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
}
