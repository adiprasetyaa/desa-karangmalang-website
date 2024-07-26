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
        return view('admin.pemerintahan.lembaga_desa.bpd.index', compact('bpd'));

        // return view('admin.ketua_rt.index', compact('ketuart'));
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
    public function show($id)
    {
        $bpd = BPD::find($id);
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'data' => $bpd
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
    public function update(Request $request, $id)
    {

        $bpd = BPD::find($id);
        
        $attributes = $request->validate([
            'Nama' => 'required|string',
            'Jabatan' => 'required|string',
            'Alamat' => 'required|string',
        ]); 
        
        $old_data = $bpd;
        $bpd->update($attributes);
        
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
    public function destroy(Request $request, $id)
    {
        $bpd = BPD::find($id);
        $old_data = $bpd;
        $bpd->delete();

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
