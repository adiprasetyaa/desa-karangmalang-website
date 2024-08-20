<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visiMisi = VisiMisi::find(1); // Mengambil post dengan id 1
        return view('admin.profil_desa.visi_misi.index', compact('visiMisi'));
    }

    public function guestView()
    {
        $visi_misi = VisiMisi::first(); // Mengambil semua data BPD dari database

        return view('guest.profil_desa.visi_misi.view', compact('visi_misi')); // Mengirim data ke view
    }

    public function create()
    {
        $visiMisi = VisiMisi::all();
        return view('admin.profil_desa.visi_misi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'visi' => 'required|string',
            'misi' => 'required|string',
        ]);

        $visimisi = VisiMisi::create($attributes);

        if(!$visimisi) {
            dd('fail');
            return redirect()->back()->with('error', 'Failed to create visi misi');
        }

        // return json
        return response()->json([
            'message' => 'VisiMisi created successfully',
            'data' => $attributes
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $visimisi = VisiMisi::find($id);
        if (!$visimisi) {
            abort(404, 'VisiMisi not found');
        }
        return view('admin.profil_desa.visi_misi.edit', compact('visimisi'));
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
        'visi' => 'required|string',
        'misi' => 'required|string',
    ]);

    // Cari data VisiMisi berdasarkan id
    $visiMisi = VisiMisi::find($id);

    // Jika tidak ditemukan, kembalikan error
    if (!$visiMisi) {
        return response()->json([
            'message' => 'VisiMisi not found',
        ], 404);
    }

    // Update data visi dan misi
    $visiMisi->update($attributes);

    // Kembalikan respons sukses dalam bentuk JSON
    return response()->json([
        'message' => 'VisiMisi updated successfully',
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
