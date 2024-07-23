<?php

namespace App\Http\Controllers;

use App\Models\Linmas;
use App\Models\Log;
use Illuminate\Http\Request;

class LinmasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $linmas = Linmas::all();
        return view('linmas.index', compact('linmas'));
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

        Linmas::create($attributes);
        
        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'menambahkan data Linmas',
            'old_data' => '-',
            'new_data' => json_encode($attributes),
        ]);
        
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data Linmas berhasil ditambahkan'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Linmas $linmas)
    {
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'data' => $linmas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Linmas $linmas)
    {
        // null
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Linmas $linmas)
    {
            $attributes = $request->validate([
                'nama' => 'required|string',
                'jabatan' => 'required|string',
                'alamat' => 'required|string',
            ]); 
            
            $old_data = $linmas;
            $linmas->update($attributes);
            
            Log::create([
                'ip_address' => $request->ip(),
                'user_id' => auth()->id(),
                'message' => 'mengubah data Linmas',
                'old_data' => json_encode($old_data),
                'new_data' => json_encode($attributes),
            ]);
            
            return response()->json([
                'success' => true,
                'status_code' => 200,
                'message' => 'Data Linmas berhasil diubah'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Linmas $linmas)
    {
        $old_data = $linmas;
        $linmas->delete();
        
        Log::create([
            'ip_address' => $request()->ip(),
            'user_id' => auth()->id(),
            'message' => 'menghapus data Linmas',
            'old_data' => json_encode($old_data),
            'new_data' => '-',
        ]);
        
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data Linmas berhasil dihapus'
        ]);
    }
}
