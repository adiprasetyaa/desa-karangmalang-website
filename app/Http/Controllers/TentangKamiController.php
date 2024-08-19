<?php

namespace App\Http\Controllers;

use App\Models\TentangKami;
use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tentangkami = TentangKami::find(1);
        return view('admin.profil_desa.tentang_kami.index', compact('tentangkami'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tentang_kami = TentangKami::all();
        return view('admin.profil_desa.tentang_kami.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $attributes = $request->validate([
            'description' => 'required|string',
        ]);

        $tentang_kami = TentangKami::create($attributes);

        if(!$tentang_kami){
            dd('fail');
            return redirect()->back()->with('error', 'Failed to create tentang kami');
        }

        return response()->json([
            'messages' => 'Tentang kami created successfully',
            'data' => $attributes
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
        $tentang_kami = TentangKami::find($id);
        if(!$tentang_kami){
            abort(404, 'Tentang kami not found!');
        }

        return view('admin.profil_desa.tentang_kami.edit', compact('tentang_kami'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $attributes = $request->validate([
            'description' => 'required|string',
        ]);

        $tentang_kami = TentangKami::find($id);

            // Jika tidak ditemukan, kembalikan error
        if (!$tentang_kami) {
            return response()->json([
                'message' => 'Tentang Kami not found',
            ], 404);
        }

        // Update data visi dan misi
        $tentang_kami->update($attributes);

        // Kembalikan respons sukses dalam bentuk JSON
        return response()->json([
            'message' => 'Tentang Kami updated successfully',
            'data' => $attributes
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
