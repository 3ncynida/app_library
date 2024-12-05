<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminindex()
    {
        $databuku = Buku::all();
        return view('admin.buku.index', compact('databuku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|max:70',
            'penerbit' => 'required|max:50',
            'tahun_terbit' => 'required|date',
            'stok' => 'required|integer|min:1',
            'detail' => 'required|string', // Validasi untuk kolom detail
        ]);
    
        // Simpan data ke database
        Buku::create([
            'judul' => $request->judul,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'stok' => $request->stok,
            'detail' => $request->detail, // Menyimpan nilai detail
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('admin.buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }
    
    /**
     * Display the specified resource.
     */
    public function detail(string $id)
    {
        $detailbuku = Buku::findOrFail($id);
        return view('admin.buku.detail', compact('detailbuku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataEditbuku = Buku::find($id);
        return view('admin.buku.edit',compact('dataEditbuku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|max:70',
            'penerbit' => 'required|max:50',
            'tahun_terbit' => 'required|date',
            'stok' => 'required|integer',
            'detail' => 'required|string|max:500', // Validasi untuk kolom detail
        ]);
    
        $buku = Buku::findOrFail($id);
        $buku->update($validated);
    
        return redirect()->route('admin.buku.index')->with('success', 'Buku berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Cari data buku berdasarkan ID
            $buku = Buku::findOrFail($id);
    
            // Hapus data buku
            $buku->delete();
    
            // Redirect dengan pesan sukses
            return redirect()->route('admin.buku.index')->with('success', 'Buku berhasil dihapus!');
        } catch (\Exception $e) {
            // Redirect dengan pesan error jika terjadi kesalahan
            return redirect()->route('admin.buku.index')->with('error', 'Gagal menghapus buku: ' . $e->getMessage());
        }
    }
    
}
