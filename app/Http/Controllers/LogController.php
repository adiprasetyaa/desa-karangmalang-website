<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // null
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
        $log = new Log();
        $log->ip_address = $request->ip();
        $log->user_id = auth()->id();
        $log->message = $request->message;
        $log->old_data = $request->old_data;
        $log->new_data = $request->new_data;
        $log->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Log $log)
    {
        // null
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Log $log)
    {
        // null
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Log $log)
    {
        // null
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Log $log)
    {
        // null
    }
}
