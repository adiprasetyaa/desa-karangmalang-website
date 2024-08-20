<?php

namespace App\Http\Controllers;

use App\Models\InfoGeografis;
use Illuminate\Http\Request;

class InfoGeografisController extends Controller
{
    public function index()
    {
        $geografis_desa= InfoGeografis::first(); // Mengambil post dengan id 1
        return view('admin.profil_desa.geografis_desa.index', compact('geografis_desa'));
    }

    public function guestView(){
        $geografis_desa = InfoGeografis::first(); // Mengambil post dengan id 1
        return view('guest.profil_desa.geografis_desa.view', compact('geografis_desa'));
    }

    public function create()
    {
        $geografis_desa= InfoGeografis::all();
        return view('admin.profil_desa.geografis_desa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'description' => 'required|string',
        ]);

        $geografis_desa= InfoGeografis::create($attributes);

        if(!$geografis_desa) {
            dd('fail');
            return redirect()->back()->with('error', 'Failed to create visi misi');
        }

        // return json
        return response()->json([
            'message' => 'info_demografi created successfully',
            'data' => $attributes
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $geografis_desa= InfoGeografis::find($id);
        if (!$geografis_desa) {
            abort(404, 'info_demografi not found');
        }
        return view('admin.profil_desa.geografis_desa.edit', compact('geografis_desa'));
    }
    

    /**
     * Update the specified resource in storage.
     */
/**
 * Update the specified resource in storage.
 */
public function update(Request $request, $id)
{
    // Validasi data yang diterima dari request
    $attributes = $request->validate([
        'description' => 'required|string',
    ]);

    // Cari data info_demografi berdasarkan id
    $geografis_desa= InfoGeografis::find($id);

    // Jika tidak ditemukan, kembalikan error
    if (!$geografis_desa) {
        return response()->json([
            'message' => 'info_demografi not found',
        ], 404);
    }

    // Update data visi dan misi
    $geografis_desa->update($attributes);

    // Kembalikan respons sukses dalam bentuk JSON
    return response()->json([
        'message' => 'Info Demografi updated successfully',
        'data' => $attributes
    ]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    
    }
}
