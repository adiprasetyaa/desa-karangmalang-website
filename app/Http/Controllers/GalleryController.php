<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $galleries = Gallery::all();
        return view('admin.informasi_publik.galeri.index', compact('galleries'));
    }

    public function guestView()
    {
        $gallery = Gallery::all(); // Mengambil semua data BPD dari database

        return view('guest.informasi_publik.galeri.view', compact('gallery')); // Mengirim data ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('admin.informasi_publik.galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $attributes = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string| max:255',
        ]);

        // Handle the image upload if present
        if ($request->hasFile('image')) {
            $attributes['image'] = $request->file('image')->store('public/images/informasi_publik/gallery');
        }

    
        // Create the StrukturOrganisasi record
        $galleries = Gallery::create($attributes);
    
        // Check if the creation was successful
        if (!$galleries) {
            return redirect()->back()->with('error', 'Foto Gagal ditambahkan');
        }
    
        // Return JSON response on success
        return response()->json([
            'message' => 'Foto berhasil ditambahkan',
            'data' => $galleries
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
        //

        $galleries = Gallery::find($id);

        return view('admin.informasi_publik.galeri.edit', compact('galleries'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $attributes = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string| max:255',
        ]);
    
        // Find the existing record
        $galleries = Gallery::find($id);
    
        if (!$galleries) {
            return response()->json(['error' => 'Struktur Organisasi not found'], 404);
        }
    
        // Handle the image upload if present
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($galleries->image) {
                Storage::delete($galleries->image);
            }
    
            // Store the new image
            $attributes['image'] = $request->file('image')->store('public/images/informasi_publik/gallery');
        }
    
        // Update the record with the new attributes
        $galleries->update($attributes);
          // Redirect back to the edit page with a success message
        return redirect()->route('admin.gallery.edit', $galleries->id)->with('success', 'Struktur Organisasi updated successfully');
    
        // Return a JSON response with success message
        // return response()->json([
        //     'message' => 'Struktur Organisasi updated successfully',
        //     'data' => $galleries
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari data LayananPublik berdasarkan id
        $gallery = Gallery::find($id);
    
        // Jika tidak ditemukan, kembalikan error
        if (!$gallery) {
            return redirect()->route('admin.gallery.index')->with('error', 'Layanan Publik not found');
        }
    
        // Hapus layanan publik
        $gallery->delete();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.gallery.index')->with('success', 'Layanan Publik deleted successfully');
    }
}
