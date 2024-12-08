<?php

namespace App\Http\Controllers;

use App\Models\Sumbangan;
use Illuminate\Http\Request;

class SumbanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sumbangans = Sumbangan::all();

        return view('sumbangan.index', compact('sumbangans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('sumbangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nama_sumbangan' => 'required|string|max:255',
            'nominal' => 'required|numeric',
        ]);

        Sumbangan::create($validated);

        return redirect()->route('sumbangan.index')->with('success', 'Sumbangan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sumbangan $sumbangan)
    {
        //
        return view('sumbangan.show', compact('sumbangan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sumbangan $sumbangan)
    {
        //
        return view('sumbangan.edit', compact('sumbangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sumbangan $sumbangan)
    {
        //
        $validated = $request->validate([
            'nama_sumbangan' => 'required|string|max:255',
            'nominal' => 'required|numeric',
        ]);

        $sumbangan->update($validated);

        return redirect()->route('sumbangan.index')->with('success', 'Sumbangan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sumbangan $sumbangan)
    {
        //
        $sumbangan->delete();

        return redirect()->route('sumbangan.index')->with('success', 'Sumbangan berhasil dihapus!');
    }
}