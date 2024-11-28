<?php

namespace App\Http\Controllers;

use App\Models\detail_perawatan;
use App\Models\perawatan;
use Illuminate\Http\Request;

class DetailPerawatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hasil = detail_perawatan::all();
        return view('perawatan.index')->with('detail_perawatans', $hasil);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     
        return view('perawatan.create');
        
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(detail_perawatan $detail_perawatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(detail_perawatan $detail_perawatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, detail_perawatan $detail_perawatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(detail_perawatan $detail_perawatan)
    {
        //
    }
}
