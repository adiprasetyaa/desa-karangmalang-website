<?php

namespace App\Http\Controllers;

use App\Models\LayananPublik;
use Illuminate\Http\Request;

class LayananPublikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $layanan_publik = LayananPublik::all();
        return view('admin.informasi_publik.layanan_publik.index', compact('layanan_publik'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $layanan_publik = LayananPublik::all();
        return view('admin.informasi_publik.layanan_publik.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $attributes = $request->validate([
            'nama_layanan' => 'required|string',
            'deskripsi_layanan' => 'required|string',
            'persyaratan' => 'required|string',
        ]);
    
        // Create layanan publik
        $layananPublik = LayananPublik::create($attributes);
    
        // Check if creation was successful
        if (!$layananPublik) {
            // Debugging or error handling
            dd('fail');
            return redirect()->back()->with('error', 'Failed to create layanan publik');
        }
    
        // Return JSON response
        return response()->json([
            'message' => 'Layanan Publik created successfully',
            'data' => $attributes
        ]);
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $layanan_publik = LayananPublik::find($id);
        return view('admin.informasi_publik.layanan_publik.show', compact('layanan_publik'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $layanan_publik = LayananPublik::find($id);
        if (!$layanan_publik) {
            abort(404, 'Layanan Publik not found');
        }
        return view('admin.informasi_publik.layanan_publik.edit', compact('layanan_publik'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $attributes = $request->validate([
            'nama_layanan' => 'required|string',
            'deskripsi_layanan' => 'required|string',
            'persyaratan' => 'required|string',
        ]);

        // Cari data VisiMisi berdasarkan id
        $layanan_publik = LayananPublik::find($id);


            // Jika tidak ditemukan, kembalikan error
        if (!$layanan_publik) {
            return response()->json([
                'message' => 'VisiMisi not found',
            ], 404);
        }

        // Update data visi dan misi
        $layanan_publik->update($attributes);

        // Kembalikan respons sukses dalam bentuk JSON
        return response()->json([
            'message' => 'Layanan Publik updated successfully',
            'data' => $attributes
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //
    // }

    public function destroy($id)
    {
        // Cari data LayananPublik berdasarkan id
        $layanan_publik = LayananPublik::find($id);
    
        // Jika tidak ditemukan, kembalikan error
        if (!$layanan_publik) {
            return redirect()->route('admin.layanan_publik.index')->with('error', 'Layanan Publik not found');
        }
    
        // Hapus layanan publik
        $layanan_publik->delete();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.layanan_publik.index')->with('success', 'Layanan Publik deleted successfully');
    }
    
}
