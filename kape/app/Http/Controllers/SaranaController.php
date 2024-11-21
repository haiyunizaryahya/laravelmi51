<?php

namespace App\Http\Controllers;

use App\Models\sarana;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class SaranaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hasil = sarana::all();
        return view('sarana.index')->with('sarana', $hasil);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('sarana.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $value = $request->validate(['nama_sarana' => 'required|unique:saranas','kategori' => 'required']);
        sarana::create($value);
        return redirect()->route('sarana.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(sarana $sarana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($sarana)
    {
        $sarana = sarana::find($sarana);
        if (!$sarana) {
            return redirect()->route('sarana.index')->with('error', 'Sarana tidak ditemukan.');
        }
        return view('sarana.edit', compact('sarana'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sarana $sarana)
    {
        $value = $request->validate(['nama_sarana' => 'required|unique:saranas']);
        $sarana->update($value);
        return redirect()->route('sarana.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($sarana)
    {
        $sarana = sarana::find($sarana);
        $sarana->delete();
        return redirect()->route('sarana.index');
    }
    public function getSarana(){
        $hasil = Sarana::all();
        return response()->json($hasil);
        }
        public function storeSarana(Request $request){
            $value = $request->validate(['nama_sarana' => 'required','kategori'=>'required','sarana_id' => 'required',]);
            sarana::create($value);
            return response()->json(['status' => 'success', 'message' => 'Data berhasil disimpan']);
        }




}
