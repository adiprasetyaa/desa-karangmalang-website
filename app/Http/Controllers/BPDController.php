<?php

namespace App\Http\Controllers;

use App\Models\BPD;
use App\Models\Log;
use Illuminate\Http\Request;

class BPDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bpd = BPD::all();
        return view('bpd.index', compact('bpd'));
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

        BPD::create($attributes);
        
        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'menambahkan data BPD',
            'old_data' => '-',
            'new_data' => json_encode($attributes),
        ]);
        
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data BPD berhasil ditambahkan'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BPD $bPD)
    {
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'data' => $bPD
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BPD $bPD)
    {
        // null
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BPD $bPD)
    {
        
        $attributes = $request->validate([
            'nama' => 'required|string',
            'jabatan' => 'required|string',
            'alamat' => 'required|string',
        ]); 
        
        $old_data = $bPD;
        $bPD->update($attributes);
        
        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'mengubah data BPD',
            'old_data' => json_encode($old_data),
            'new_data' => json_encode($attributes),
        ]);
        
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data BPD berhasil diubah'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, BPD $bPD)
    {
        $old_data = $bPD;
        $bPD->delete();

        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'menghapus data BPD',
            'old_data' => json_encode($old_data),
            'new_data' => '-',
        ]);

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data BPD berhasil dihapus'
        ]);
    }
}
