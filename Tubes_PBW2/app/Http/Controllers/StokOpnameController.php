<?php

namespace App\Http\Controllers;

use App\DataTables\StokOpnamesDataTable;
use App\DataTables\StokOpnameSpesifikDataTable;
use App\Models\Obat;
use App\Models\StokOpname;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokOpnameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(StokOpnamesDataTable $dataTable)
    {
        return $dataTable->render('stockOpname.viewStockOpname');
    }

    
public function indexSpesifik(StokOpnameSpesifikDataTable $dataTable, $stokOpname)
{
    $dataTable->setStokOpnameId($stokOpname); // Set the ID for filtering
    return $dataTable->render('stockOpname.spesifikStockOpname');
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $stokOpname = new StokOpname();
        return view("stockOpname.tambahStockOpname", compact('stokOpname'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'id_obat' => ['required', 'integer'],
            'tempat_simpan'=> ['required', 'string'],
            'tanggal_simpan' => ['required', 'date'],
            'stok_keluar' => ['required', 'integer'],
            'sisa_stock' => ['required', 'integer'],
            'keterangan'=> ['required', 'string'],
    ]);
    
    StokOpname::create([
        'id_obat' => $request->id_obat,
        'tempat_simpan' => $request->tempat_simpan,
        'tanggal_simpan' => $request->tanggal_simpan,
        'sisa_stock' => $request->sisa_stock,
        'stok_keluar' => $request->stok_keluar,
        'keterangan' => $request->keterangan,
    ]);
        return redirect()->route('stockOpname.viewStockOpname');
    }

    /**
     * Display the specified resource.
     */
    public function show(StokOpname $stokOpname)
    {
        //
        return view("stockOpname.editStockOpname", compact('stokOpname'));
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
    public function update(Request $request)
    {
        //
        $request->validate([
            'tempat_simpan'=> ['required', 'string'],
            'tanggal_simpan' => ['required', 'date'],
            'stok_keluar' => ['required', 'integer'],
            'sisa_stock' => ['required', 'integer'],
            'keterangan'=> ['required', 'string'],
    ]);

    StokOpname::where('id', $request->id)
        ->update([
            'tempat_simpan' => $request->tempat_simpan,
            'tanggal_simpan' => $request->tanggal_simpan,
            'sisa_stock' => $request->sisa_stock,
            'stok_keluar' => $request->stok_keluar,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('stockOpname.viewStockOpname');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getStockOpname() {
        $stokOpname = StokOpname::with(['obat', 'detailPenerimaan'])
            ->select(
                'stok_opname.id_obat',
                'stok_opname.tempat_simpan',
                'stok_opname.tanggal_simpan',
                'stok_opname.sisa_stock',
                'stok_opname.keterangan',
                'stok_opname.stok_keluar',
            )
            ->orderBy('stok_opname.id_obat', 'desc')
            ->get();

            $processed = [];
            foreach ($stokOpname as $item) {
                $idObat = $item->id_obat;
                $tempatSimpan = $item->tempat_simpan;
                $tanggal_simpan = $item->tanggal_simpan;
                $sisa_stock = $item->sisa_stock;
                $keterangan = $item->keterangan;
                $stok_keluar = $item->stok_keluar;
        
                $obatData = $item->obat; // Access columns from Obat
                $detailPenerimaanData = $item->detailPenerimaan; // Access columns from DetailPenerimaan
        
    
                $processed[] = [
                    'id_obat' => $idObat,
                    'tempat_simpan' => $tempatSimpan,
                    'tanggal_simpan' => $tanggal_simpan,
                    'sisa_stock' => $sisa_stock,
                    'keterangan' => $keterangan,
                    'stok_keluar' => $stok_keluar,
                    'obat_data' => $obatData,
                    'detail_penerimaan_data' => $detailPenerimaanData,
                ];
            }

        return response()->json($processed, 200);
    }
}
