<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datausers = User::all();
        return view('admin.users.index', compact('datausers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datausers = User::all();
        return view('admin.users.create', compact('datausers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,peminjam',
        ]);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
    
        return redirect()->route('admin.users.index')->with('success', 'User berhasil dibuat.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Cari data buku berdasarkan ID
            $buku = User::findOrFail($id);
    
            // Hapus data buku
            $buku->delete();
    
            // Redirect dengan pesan sukses
            return redirect()->route('admin.users.index')->with('success', 'users berhasil dihapus!');
        } catch (\Exception $e) {
            // Redirect dengan pesan error jika terjadi kesalahan
            return redirect()->route('admin.users.index')->with('error', 'Gagal menghapus users: ' . $e->getMessage());
        }
    }
}
