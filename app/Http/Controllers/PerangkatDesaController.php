<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\PerangkatDesa;
use Illuminate\Http\Request;

class PerangkatDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $perangkatdesa = PerangkatDesa::all();
        return view('perangkatdesa.index', compact('perangkatdesa'));
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

        PerangkatDesa::create($attributes);

        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'menambahkan data Perangkat Desa',
            'old_data' => '-',
            'new_data' => json_encode($attributes),
        ]);

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data Perangkat Desa berhasil ditambahkan'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PerangkatDesa $perangkatDesa)
    {
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'data' => $perangkatDesa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerangkatDesa $perangkatDesa)
    {
        // null
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PerangkatDesa $perangkatDesa)
    {
        $attributes = $request->validate([
            'nama' => 'required|string',
            'jabatan' => 'required|string',
        ]);

        $old_data = $perangkatDesa;
        $perangkatDesa->update($attributes);

        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'mengubah data Perangkat Desa',
            'old_data' => json_encode($old_data),
            'new_data' => json_encode($attributes),
        ]);

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data Perangkat Desa berhasil diubah'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, PerangkatDesa $perangkatDesa)
    {
        $old_data = $perangkatDesa;
        $perangkatDesa->delete();

        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'menghapus data Perangkat Desa',
            'old_data' => json_encode($old_data),
            'new_data' => '-',
        ]);

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data Perangkat Desa berhasil dihapus'
        ]);
    }
}
