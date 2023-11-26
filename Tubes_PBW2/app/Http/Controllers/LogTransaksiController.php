<?php

namespace App\Http\Controllers;

use App\DataTables\LogTransaksiDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LogTransaksiDataTable $dataTable)
    {
        return $dataTable->render('log.logTransaksi');
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

    public function getLogTransaksi() {
        $log_transaksi = DB::table('log_transaksi')
            ->select(
                'log_transaksi.id as id',
                'log_transaksi.tipe as tipe',
                'log_transaksi.id_penerimaan',
                'log_transaksi.id_penjualan',
                'log_transaksi.id_obat',
                'obat.nama_obat',
                'detail_penerimaan.stock_masuk as jumlah_terima',
                'detail_penerimaan.total_harga as harga_terima',
                'penjualan.total_barang as jumlah_jual',
                'penjualan.total_harga as harga_jual',
                DB::raw('
                    IF(log_transaksi.id_penerimaan IS NOT NULL, 
                        detail_penerimaan.stock_masuk,
                        penjualan.total_barang
                    ) AS jumlah'),
                DB::raw('
                    IF(log_transaksi.id_penerimaan IS NOT NULL, 
                        DATE_FORMAT(detail_penerimaan.tanggal, "%d-%m-%Y"),
                        DATE_FORMAT(penjualan.tanggal_transaksi, "%d-%m-%Y")
                    ) AS tanggal'),
                DB::raw('
                    IF(log_transaksi.id_penerimaan IS NOT NULL, 
                        detail_penerimaan.total_harga,
                        penjualan.total_harga
                    ) AS harga')
            )
            ->leftJoin('detail_penerimaan', 'log_transaksi.id_penerimaan', '=', 'detail_penerimaan.id')
            ->leftJoin('penjualan', 'log_transaksi.id_penjualan', '=', 'penjualan.id')
            ->leftJoin('obat', 'log_transaksi.id_obat', '=', 'obat.id')
            ->orderBy('log_transaksi.id', 'asc')
            ->get();
    
        return response()->json($log_transaksi, 200);
    }
}
