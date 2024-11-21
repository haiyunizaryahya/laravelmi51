<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('user.index')->with ('data_user',$user);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('user.create')
        ->with('user',user::all());
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $value = $request->validate([
            'name' => 'required', //required wajib diisi
            'email' => 'required|email|unique:users', // memastikan email unik dan valid
            'password' => 'required', //required wajib diisi
            'role' => 'required', //required wajib diisi
            'poto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // validasi untuk file foto
        ]);
    
        // Hash password
        $value['password'] = bcrypt($value['password']);
    
        // Handle upload foto jika ada
        if ($request->hasFile('poto')) {
            $filename = time() . '_' . $request->file('poto')->getClientOriginalName();
            $path = $request->file('poto')->move(public_path('images'), $filename);
            $value['poto'] = 'images/' . $filename; // simpan path foto ke dalam field 'poto'
        }
    
        // Simpan data ke tabel 'users'
        User::create($value);
    
        // Redirect ke route user.index
        return redirect()->route('user.index')->with('success', 'User created successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $user)
    {
        $user = user::find($user);
        return view('user.edit',compact('user',));
        
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user)
    {
        $user = User::findOrFail($user);  // Pastikan data user ditemukan
        
        // Validasi data input
        $value = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id, // pastikan email unik selain user ini
            'password' => 'nullable|min:6', // password opsional
            'role' => 'required',
            'poto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // validasi untuk file foto
        ]);
    
        // Perbarui data user kecuali password (hanya diubah jika diisi)
        $user->name = $value['name'];
        $user->email = $value['email'];
        if (!empty($value['password'])) {
            $user->password = bcrypt($value['password']);
        }
        $user->role = $value['role'];
    
        // Upload file poto jika ada
        if ($request->hasFile('poto')) {
            // Hapus foto lama jika ada
            if ($user->poto && file_exists(public_path($user->poto))) {
                unlink(public_path($user->poto));
            }
    
            // Simpan foto baru
            $filename = time() . '_' . $request->file('poto')->getClientOriginalName();
            $path = $request->file('poto')->move(public_path('images'), $filename);
            $user->poto = 'images/' . $filename; // simpan path foto ke dalam field 'poto'
        }
    
        $user->save();
    
        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success','Data Berhasil Dihapus' );
    }
}
