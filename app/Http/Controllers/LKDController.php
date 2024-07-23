<?php

namespace App\Http\Controllers;

use App\Models\LKD;
use App\Models\Log;
use Illuminate\Http\Request;

class LKDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $lkd = LKD::all();
        return view('lkd.index', compact('lkd'));
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

        LKD::create($attributes);
        
        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'menambahkan data LKD',
            'old_data' => '-',
            'new_data' => json_encode($attributes),
        ]);
        
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data LKD berhasil ditambahkan'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(LKD $lKD)
    {
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data LKD berhasil ditampilkan',
            'data' => $lKD
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LKD $lKD)
    {
        // null
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LKD $lKD)
    {
        $attributes = $request->validate([
            'nama' => 'required|string',
            'jabatan' => 'required|string',
        ]); 

        $old_data = $lKD;
        $lKD->update($attributes);

        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'mengubah data LKD',
            'old_data' => json_encode($old_data),
            'new_data' => json_encode($attributes),
        ]);

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data LKD berhasil diubah'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, LKD $lKD)
    {
        $old_data = $lKD;
        $lKD->delete();

        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'menghapus data LKD',
            'old_data' => json_encode($old_data),
            'new_data' => '-',
        ]);

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data LKD berhasil dihapus'
        ]);
    }
}
