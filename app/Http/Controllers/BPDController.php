<?php

namespace App\Http\Controllers;

use App\Models\BPD;
use App\Models\Log;
use Illuminate\Http\Request;

class BPDController extends Controller
{
    public function view()
    {
        return view('admin.pemerintahan.lembaga_desa.bpd.view');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bpd = BPD::all();

        if($bpd->isEmpty()){
            return response()->json([
                'success' => false,
                'status_code' => 404,
                'message' => 'Data BPD tidak ditemukan'
            ]);
        }

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'data' => $bpd
        ]);

        // return view('admin.ketua_rt.index', compact('ketuart'));
    }

        // Method untuk guest mengakses halaman BPD
    public function guestView()
    {
        $bpd = BPD::all(); // Mengambil semua data BPD dari database

        return view('guest.pemerintahan.lembaga_desa.bpd.view', compact('bpd')); // Mengirim data ke view
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

        $bpd = BPD::create($attributes);
        
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
            'message' => 'Data BPD berhasil ditambahkan',
            'data' => $bpd
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
            'message' => 'Data BPD berhasil diubah',
            'data' => $bpd
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
            'message' => 'Data BPD berhasil dihapus',
            'data' => $bpd
        ]);
    }
}
