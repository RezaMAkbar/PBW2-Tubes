<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\DetailPenerimaanDataTable;
use App\DataTables\PenjualanDataTable;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function indexTerima(DetailPenerimaanDataTable $penerimaanDataTable)
    {
        return $penerimaanDataTable->render('transaksi.viewDetailTransaksiTerima');
    }

    public function indexJual(PenjualanDataTable $penjualanDataTable)
    {
        return $penjualanDataTable->render('transaksi.viewDetailTransaksiJual');
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
