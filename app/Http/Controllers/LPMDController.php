<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\LPMD;
use Illuminate\Http\Request;

class LPMDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lpmd = LPMD::all();
        return view('lpmd.index', compact('lpmd'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // null
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'nama' => 'required|string',
            'jabatan' => 'required|string',
            'alamat' => 'required|string',
        ]); 

        LPMD::create($attributes);
        
        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'menambahkan data LPMD',
            'old_data' => '-',
            'new_data' => json_encode($attributes),
        ]);
        
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data LPMD berhasil ditambahkan'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(LPMD $lPMD)
    {
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data LPMD berhasil ditampilkan',
            'data' => $lPMD
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LPMD $lPMD)
    {
        // null
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LPMD $lPMD)
    {
        $attributes = $request->validate([
            'nama' => 'required|string',
            'jabatan' => 'required|string',
            'alamat' => 'required|string',
        ]); 

        $lPMD->update($attributes);
        
        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'mengubah data LPMD',
            'old_data' => json_encode($lPMD),
            'new_data' => json_encode($attributes),
        ]);
        
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data LPMD berhasil diubah'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, LPMD $lPMD)
    {
        $old_data = $lPMD;
        $lPMD->delete();

        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'menghapus data LPMD',
            'old_data' => json_encode($old_data),
            'new_data' => '-',
        ]);

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data LPMD berhasil dihapus'
        ]);
    }
}
