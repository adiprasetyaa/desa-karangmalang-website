<?php

namespace App\Http\Controllers;

use App\Models\InfoDemografi;
use Illuminate\Http\Request;

class InfoDemografiController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demografi_desa = InfoDemografi::find(1); // Mengambil post dengan id 1
        return view('admin.profil_desa.demografi_desa.index', compact('demografi_desa'));
    }

    public function create()
    {
        $demografi_desa = InfoDemografi::all();
        return view('admin.profil_desa.demografi_desa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'description' => 'required|string',
        ]);

        $demografi_desa = InfoDemografi::create($attributes);

        if(!$demografi_desa) {
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
        $demografi_desa = InfoDemografi::find($id);
        if (!$demografi_desa) {
            abort(404, 'info_demografi not found');
        }
        return view('admin.profil_desa.demografi_desa.edit', compact('demografi_desa'));
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
    $demografi_desa = InfoDemografi::find($id);

    // Jika tidak ditemukan, kembalikan error
    if (!$demografi_desa) {
        return response()->json([
            'message' => 'info_demografi not found',
        ], 404);
    }

    // Update data visi dan misi
    $demografi_desa->update($attributes);

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
