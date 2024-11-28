<?php

namespace App\Http\Controllers;

use App\Models\lantai;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class LantaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hasil = lantai::all();
        return view('lantai.index')->with('data_lantai', $hasil);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lantai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $value = $request->validate(['nama_lantai' => 'required|unique:lantais']);
        lantai::create($value);
        return redirect()->route('lantai.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(lantai $lantai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Mencari lantai berdasarkan ID
        $lantai = Lantai::find($id);
    
        // Cek apakah lantai ditemukan
        if (!$lantai) {
            return redirect()->route('lantai.index')->with('error', 'Lantai tidak ditemukan.');
        }
    
        // Kembalikan view dengan data lantai
        return view('lantai.edit', compact('lantai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $lantai)
    {
        $lantai= lantai::find($lantai);
        // dd($lantai);
        $value = $request->validate(['nama_lantai' => 'required']);
        $lantai->update($value);
        return redirect()->route('lantai.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $lantai)
    {
        $lantai = lantai::find($lantai);
        $lantai->delete();
        return redirect()->route('lantai.index');
    }
    public function getLantai(){
        $hasil = lantai::all();
        return response()->json($hasil);

    }
    public function storeLantai(Request $request){

        $value = $request->validate(['nama_lantai' => 'required|unique:lantais']);
        lantai::create($value);
        return response()->json(['message' => 'Lantai berhasil ditambahkan']);
    }
    

}
