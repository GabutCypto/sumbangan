<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Santri;
use App\Models\Sumbangan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $santris = Santri::all();
        // Mengambil semua data sumbangan
        $sumbangans = Sumbangan::all();

        // Ambil pembayaran yang relevan untuk santri dan sumbangan
        // Kita dapat menggunakan eager loading untuk memuat relasi santri dan sumbangan
        $pembayarans = Pembayaran::with(['santri', 'sumbangan'])->get();

        // Mengirimkan data ke view
        return view('pembayaran.index', compact('santris', 'sumbangans', 'pembayarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil data santri dan sumbangan untuk ditampilkan pada form
        $santris = Santri::all();
        $sumbangans = Sumbangan::all();
        return view('pembayaran.create', compact('santris', 'sumbangans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'sumbangan_id' => 'required|exists:sumbangans,id',
            'jumlah_bayar' => 'required|numeric|min:0',
        ]);

        // Simpan data pembayaran ke dalam database
        Pembayaran::create($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        // Menampilkan detail pembayaran
        return view('pembayaran.show', compact('pembayaran'));
    }
}