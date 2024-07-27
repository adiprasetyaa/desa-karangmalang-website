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
        $spmdes = SPMDES::all();
        return view('admin.pemerintahan.lembaga_desa.spmdes.index', compact('spmdes'));
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
    public function show($id)
    {
        $spmdes = SPMDES::find($id);
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'data' => $spmdes
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
    public function update(Request $request, $id)
    {
        $spmdes = SPMDES::find($id);
        $attributes = $request->validate([
            'Nama' => 'required|string',
            'Jabatan' => 'required|string',
        ]);

        $old_data = $spmdes;
        $spmdes->update($attributes);

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
    public function destroy(Request $request, $id)
    {
        $spmdes = SPMDES::find($id);
        $old_data = $spmdes;
        $spmdes->delete();

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
