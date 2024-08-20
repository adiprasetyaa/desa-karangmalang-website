<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\PerangkatDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerangkatDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $perangkat_desa = PerangkatDesa::all();
        return view('admin.pemerintahan.pemerintah_desa.perangkat_desa.index', compact('perangkat_desa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // null
        return view('admin.pemerintahan.pemerintah_desa.perangkat_desa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request input
        $attributes = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Nama' => 'required|string|max:255',
            'Jabatan' => 'required|string|max:255'
        ]);
    
        // Handle the image upload if present
        // Handle the image upload if present
        if ($request->hasFile('image')) {
            $attributes['image'] = $request->file('image')->store('public/images/pemerintahan/pemerintah_desa/perangkat_desa');
        }

    
        // Create the StrukturOrganisasi record
        $perangkat_desa = PerangkatDesa::create($attributes);
    
        // Check if the creation was successful
        if (!$perangkat_desa) {
            return redirect()->back()->with('error', 'Failed to create Struktur Organisasi');
        }
    
        // Return JSON response on success
        return response()->json([
            'message' => 'Struktur Organisasi created successfully',
            'data' => $perangkat_desa
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $perangkat_desa = PerangkatDesa::find($id);
        return view('admin.pemerintahan.pemerintah_desa.perangkat_desa.show', compact('perangkat_desa'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // null
        $perangkat_desa = PerangkatDesa::find($id);

        return view('admin.pemerintahan.pemerintah_desa.perangkat_desa.edit', compact('perangkat_desa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request input
        $attributes = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Nama' => 'required|string|max:255',
            'Jabatan' => 'required|string|max:255'
        ]);

        $perangkat_desa = PerangkatDesa::find($id);

        if (!$perangkat_desa) {
            return response()->json(['error' => 'Struktur Organisasi not found'], 404);
        }

        // Handle the image upload if present
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($perangkat_desa->image) {
                Storage::delete($perangkat_desa->image);
            }
    
            // Store the new image
            $attributes['image'] = $request->file('image')->store('public/images/pemerintahan/pemerintah_desa/perangkat_desa');
        }
    
        // Update the record with the new attributes
        $perangkat_desa->update($attributes);
    
        // Return a JSON response with success message
        return response()->json([
            'message' => 'Struktur Organisasi updated successfully',
            'data' => $perangkat_desa
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */

     public function destroy($id)
     {
         // Cari data LayananPublik berdasarkan id
         $perangkat_desa = PerangkatDesa::find($id);
     
         // Jika tidak ditemukan, kembalikan error
         if (!$perangkat_desa) {
             return redirect()->route('admin.perangkat_desa.index')->with('error', 'Layanan Publik not found');
         }
     
         // Hapus layanan publik
         $perangkat_desa->delete();
     
         // Redirect ke halaman index dengan pesan sukses
         return redirect()->route('admin.perangkat_desa.index')->with('success', 'Layanan Publik deleted successfully');
     }
}
