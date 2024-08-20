<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class StrukturOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $struktur_organisasi = StrukturOrganisasi::first();
        return view('admin.pemerintahan.pemerintah_desa.struktur_organisasi.index', compact('struktur_organisasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.pemerintahan.pemerintah_desa.struktur_organisasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request input
        $attributes = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'periode_awal' => 'required|integer|digits:4',
            'periode_akhir' => 'required|integer|digits:4|after_or_equal:periode_awal'
        ]);
    
        // Handle the image upload if present
        // Handle the image upload if present
        if ($request->hasFile('image')) {
            $attributes['image'] = $request->file('image')->store('public/images/pemerintahan/pemerintah_desa/struktur_organisasi');
        }

    
        // Create the StrukturOrganisasi record
        $struktur_organisasi = StrukturOrganisasi::create($attributes);
    
        // Check if the creation was successful
        if (!$struktur_organisasi) {
            return redirect()->back()->with('error', 'Failed to create Struktur Organisasi');
        }
    
        // Return JSON response on success
        return response()->json([
            'message' => 'Struktur Organisasi created successfully',
            'data' => $struktur_organisasi
        ]);
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
    public function edit($id)
    {
        $struktur_organisasi = StrukturOrganisasi::find($id);

        return view('admin.pemerintahan.pemerintah_desa.struktur_organisasi.edit', compact('struktur_organisasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request input
        $attributes = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'periode_awal' => 'required|integer|digits:4',
            'periode_akhir' => 'required|integer|digits:4|after_or_equal:periode_awal'
        ]);
    
        // Find the existing record
        $struktur_organisasi = StrukturOrganisasi::find($id);
    
        if (!$struktur_organisasi) {
            return response()->json(['error' => 'Struktur Organisasi not found'], 404);
        }
    
        // Handle the image upload if present
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($struktur_organisasi->image) {
                Storage::delete($struktur_organisasi->image);
            }
    
            // Store the new image
            $attributes['image'] = $request->file('image')->store('public/images/pemerintahan/pemerintah_desa/struktur_organisasi');
        }
    
        // Update the record with the new attributes
        $struktur_organisasi->update($attributes);
    
        // Return a JSON response with success message
        return response()->json([
            'message' => 'Struktur Organisasi updated successfully',
            'data' => $struktur_organisasi
        ]);
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
