<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data santri
        $santris = Santri::all();
        return view('santri.index', compact('santris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('santri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'wali' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'ruang' => 'required|string|max:255',
        ]);

        // Simpan data santri ke dalam database
        Santri::create($validated);

        // Redirect ke halaman index setelah data berhasil disimpan
        return redirect()->route('santri.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Santri $santri)
    {
        return view('santri.show', compact('santri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Santri $santri)
    {
        return view('santri.edit', compact('santri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Santri $santri)
    {
        // Validasi data input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'wali' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'ruang' => 'required|string|max:255',
        ]);

        // Update data santri
        $santri->update($validated);

        // Redirect ke halaman index setelah data berhasil diupdate
        return redirect()->route('santri.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Santri $santri)
    {
        // Hapus data santri
        $santri->delete();

        // Redirect ke halaman index setelah data dihapus
        return redirect()->route('santri.index');
    }
}