<?php

namespace App\Http\Controllers;

use App\Models\BUMDES;
use App\Models\Log;
use Illuminate\Http\Request;

class BUMDESController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bumdes = BUMDES::all();
        return view('bumdes.index', compact('bumdes'));
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

        BUMDES::create($attributes);
        
        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'menambahkan data BUMDES',
            'old_data' => '-',
            'new_data' => json_encode($attributes),
        ]);
        
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data Bumdes berhasil ditambahkan'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BUMDES $bUMDES)
    {
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'data' => $bUMDES
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BUMDES $bUMDES)
    {
        // null
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BUMDES $bUMDES)
    {
        
        $attributes = $request->validate([
            'nama' => 'required|string',
            'jabatan' => 'required|string',
        ]); 

        $old_data = $bUMDES;
        $bUMDES->update($attributes);
        
        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'mengubah data BUMDES',
            'old_data' => json_encode($old_data),
            'new_data' => json_encode($attributes),
        ]);
        
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data BUMDES berhasil diubah'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, BUMDES $bUMDES)
    {

        $old_data = $bUMDES;
        $bUMDES->delete();

        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'menghapus data BUMDES',
            'old_data' => json_encode($old_data),
            'new_data' => '-',
        ]);

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data BUMDES berhasil dihapus'
        ]);
    }
}
