<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\SPMDES;
use Illuminate\Http\Request;

class SPMDESController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $spm = SPMDES::all();
        return view('spm.index', compact('spm'));
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
        ]); 

        SPMDES::create($attributes);
        
        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'menambahkan data SPMDES',
            'old_data' => '-',
            'new_data' => json_encode($attributes),
        ]);
        
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data SPMDES berhasil ditambahkan'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(SPMDES $sPMDES)
    {
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'data' => $sPMDES
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SPMDES $sPMDES)
    {
        // null
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SPMDES $sPMDES)
    {
        $attributes = $request->validate([
            'nama' => 'required|string',
            'jabatan' => 'required|string',
        ]);

        $old_data = $sPMDES;
        $sPMDES->update($attributes);

        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'mengubah data SPMDES',
            'old_data' => json_encode($old_data),
            'new_data' => json_encode($attributes),
        ]);

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data SPMDES berhasil diubah'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, SPMDES $sPMDES)
    {
        $old_data = $sPMDES;

        $sPMDES->delete();

        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'menghapus data SPMDES',
            'old_data' => json_encode($old_data),
            'new_data' => '-',
        ]);

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data SPMDES berhasil dihapus'
        ]);
    }
}
