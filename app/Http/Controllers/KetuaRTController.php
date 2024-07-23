<?php

namespace App\Http\Controllers;

use App\Models\KetuaRT;
use App\Models\Log;
use Illuminate\Http\Request;

class KetuaRTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ketuart = KetuaRT::all();
        return view('ketuart.index', compact('ketuart'));
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
            // 'TTL' => 'required|date',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'Alamat' => 'required|string',
            'rt' => 'required|string',
            'NoHandphone' => 'required|string',
            // 'PeriodeStart' => 'required|date',
            // 'PeriodeEnd' => 'required|date',
        ]);

        KetuaRT::create($attributes);

        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'menambahkan data Ketua RT',
            'old_data' => '-',
            'new_data' => json_encode($attributes),
        ]);

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data Ketua RT berhasil ditambahkan'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(KetuaRT $ketuaRT)
    {
        return response()->json([
            'success' => true,
            'status_code' => 200,
            'data' => $ketuaRT
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KetuaRT $ketuaRT)
    {
        // null
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KetuaRT $ketuaRT)
    {
        $attributes = $request->validate([
            'Nama' => 'required|string',
            // 'TTL' => 'required|date',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'Alamat' => 'required|string',
            'rt' => 'required|string',
            'NoHandphone' => 'required|string',
            // 'PeriodeStart' => 'required|date',
            // 'PeriodeEnd' => 'required|date',
        ]);

        $old_data = $ketuaRT;
        $ketuaRT->update($attributes);

        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'mengubah data Ketua RT',
            'old_data' => json_encode($old_data),
            'new_data' => json_encode($attributes),
        ]);

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data Ketua RT berhasil diubah'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, KetuaRT $ketuaRT)
    {
        $old_data = $ketuaRT;
        $ketuaRT->delete();

        Log::create([
            'ip_address' => $request->ip(),
            'user_id' => auth()->id(),
            'message' => 'menghapus data Ketua RT',
            'old_data' => json_encode($old_data),
            'new_data' => '-',
        ]);

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Data Ketua RT berhasil dihapus'
        ]);
    }
}
