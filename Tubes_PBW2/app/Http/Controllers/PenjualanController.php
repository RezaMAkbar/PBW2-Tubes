<?php

namespace App\Http\Controllers;

use App\DataTables\PenjualanDataTable;
use App\Models\Log;
use App\Models\LogTransaksi;
use App\Models\Obat;
use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PenjualanDataTable $dataTable)
    {
        return $dataTable->render('transaksi.viewDetailTransaksi');
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
            'id_obat_jual' => ['required', 'integer'],
            'total_barang' => ['required', 'integer'],
        ]);
    
       
        $penjualan = Penjualan::create([
            'username' => $request->usernamePenjualan,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'total_harga' => $request->total_harga_penjualan,
            'id_obat' => $request->id_obat_jual,
            'total_barang' => $request->total_barang,
        ]);

        LogTransaksi::create([
            'tipe' => 'penjualan',
            'id_obat' => $request->id_obat_jual,
            'id_penjualan' => $penjualan->id,
        ]);
        
        return redirect('/viewTransaksiJual');
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

    public function getPenjualan() {
        $penjualan = DB::table('penjualan')
            ->select(
                'penjualan.id',
                'penjualan.username',
                'penjualan.tanggal_transaksi',
                'penjualan.total_harga',
                'penjualan.total_barang',
                'penjualan.id_obat',
                'obat.nama_obat',
            )
            ->leftJoin('obat', 'penjualan.id_obat', '=', 'obat.id')
            ->orderBy('penjualan.id', 'asc')
            ->get();
        return response()->json($penjualan, 200);
            }
}
