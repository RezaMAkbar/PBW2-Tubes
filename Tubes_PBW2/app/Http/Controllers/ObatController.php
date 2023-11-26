<?php

namespace App\Http\Controllers;

use App\DataTables\ObatDataTable;

use App\Models\Obat;
use App\Models\StokOpname;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ObatDataTable $dataTable)
    {
        return $dataTable->render('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('obat.tambahObat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_obat' => ['required', 'string'],
            'stock' => ['required', 'integer'],
            'harga' => ['required', 'integer'],
            'tanggal_masuk' => ['required', 'date'],
            'expired' => ['required', 'date'],
            'no_batch' => ['required', 'string'],
        ]);
    
       
        $obat = Obat::create([
            'nama_obat' => $request->nama_obat,
            'stock' => $request->stock,
            'harga' => $request->harga,
            'tanggal_masuk' => $request->tanggal_masuk,
            'expired' => $request->expired,
            'no_batch' => $request->no_batch,
        ]);

        StokOpname::create([
            'id_obat' => $obat->id,
            'tanggal_simpan' => $request->tanggal_masuk,
        ]);
    
        
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Obat $obat)
    {
        //
        $obatIds = Obat::pluck('id'); //get the id for the meds
        return view("obat.editObat", compact('obat', 'obatIds'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obat $obat)
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
            'id_obat' => ['required', 'integer'],
            'nama_obat' => ['required', 'string'],
            'stock' => ['required', 'integer'],
            'harga' => ['required', 'integer'],
            'tanggal_masuk'=> ['required', 'date'],
            'expired'=> ['required', 'date'],
            'no_batch'=> ['required', 'string'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'] // Validation rules for image
    ]);

    $obat = Obat::find($request->id_obat);

    if ($obat) {
        if ($request->hasFile('image')) {
            // Check if there's an existing image for that meds (uses obat.id)
            if ($obat->images->isNotEmpty()) {
                // update the existing image If image exists
                $existingImage = $obat->images->first();
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $imagePath = $image->storeAs('images', $imageName, 'public');

                $existingImage->update([
                    'path' => $imagePath,
                    'name' => $imageName,
                ]);
            } else {
                //create new image for the meds If no image exists 
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $imagePath = $image->storeAs('images', $imageName, 'public');

                $obat->images()->create([
                    'path' => $imagePath,
                    'name' => $imageName,
                ]);
            }
        }

    Obat::where('id', $request->id_obat)
        ->update([
            'nama_obat' => $request->nama_obat,
            'stock' => $request->stock,
            'harga' => $request->harga,
            'tanggal_masuk' => $request->tanggal_masuk,
            'expired' => $request->expired,
            'no_batch' => $request->no_batch,
        ]);

        return redirect()->route('dashboard');
    }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        $request->validate([
            'id' => 'required|exists:obat,id', // Validate the ID to ensure it exists
        ]);
    
        Obat::destroy($request->id); // Delete the record
    
        return redirect()->route('dashboard'); 
    }

    public function getObat() {
        $obat = DB::table('obat')
            ->select(
                'obat.id',
                'obat.nama_obat',
                'obat.stock',
                'obat.harga',
                'obat.tanggal_masuk',
                'obat.expired',
                'obat.no_batch',
                'images.name'
            )
            ->leftJoin('images', 'obat.id', '=', 'images.id_obat')
            ->orderBy('obat.id', 'asc')
            ->get();
        return response()->json($obat, 200);
    }
}
