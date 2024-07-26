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
        return view('admin.pemerintahan.lembaga_desa.lpmd.index', compact('lpmd'));
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
            'Nama' => 'required|string',
            'Jabatan' => 'required|string',
            'Alamat' => 'required|string',
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
    public function show($id)
    {
        $lpmd = LPMD::find($id);
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'data' => $lpmd
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
    public function update(Request $request, $id)
    {

        $lpmd = LPMD::find($id);

        $attributes = $request->validate([
            'Nama' => 'required|string',
            'Jabatan' => 'required|string',
            'Alamat' => 'required|string',
        ]); 

        $old_data = $lpmd;
        $lpmd->update($attributes);
        
        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'mengubah data LPMD',
            'old_data' => json_encode($old_data),
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
    public function destroy(Request $request, $id)
    {
        $lpmd = LPMD::find($id);
        $old_data = $lpmd;
        $lpmd->delete();

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
