<?php

namespace App\Http\Controllers;

use App\Models\DetailPenerimaan;
use App\Models\LogTransaksi;
use App\Models\Obat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailPenerimaanController extends Controller
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
            'no_nota' => ['required', 'string'],
            'usernamePenerimaan' => ['required', 'string'],
            'tanggal' => ['required', 'date'],
            'harga_beli' => ['required', 'integer'],
            'total_harga_penerimaan' => ['required', 'integer'],
            'id_obat_nerima' => ['required', 'integer'],
            'stock_masuk' => ['required', 'integer'],
        ]);
    
       
        $penerimaan = DetailPenerimaan::create([
            'no_nota' => $request->no_nota,
            'username' => $request->usernamePenerimaan,
            'tanggal' => $request->tanggal,
            'harga_beli' => $request->harga_beli,
            'total_harga' => $request->total_harga_penerimaan,
            'id_obat' => $request->id_obat_nerima,
            'stock_masuk' => $request->stock_masuk,
        ]);

        LogTransaksi::create([
            'tipe' => 'penerimaan',
            'id_obat' => $request->id_obat_nerima,
            'id_penerimaan'=> $penerimaan->id,
        ]);
    
    
        
        return redirect('/viewTransaksiTerima');
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailPenerimaan $detailPenerimaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailPenerimaan $detailPenerimaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailPenerimaan $detailPenerimaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailPenerimaan $detailPenerimaan)
    {
        //
    }

    public function getDetailPenerimaan() {
        $dp = DB::table('detail_penerimaan')
            ->select(
                'detail_penerimaan.id',
                'detail_penerimaan.no_nota',
                'detail_penerimaan.username',
                'detail_penerimaan.tanggal',
                'detail_penerimaan.harga_beli',
                'detail_penerimaan.stock_masuk',
                'detail_penerimaan.id_obat',
                'obat.nama_obat',
            )
            ->leftJoin('obat', 'detail_penerimaan.id_obat', '=', 'obat.id')
            ->orderBy('detail_penerimaan.id', 'asc')
            ->get();
        return response()->json($dp, 200);
            }
}
