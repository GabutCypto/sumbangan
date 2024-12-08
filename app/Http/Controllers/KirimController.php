<?php

namespace App\Http\Controllers;

use App\Models\Kirim;
use App\Models\Santri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class KirimController extends Controller
{
    public function __construct()
    {
        // Memastikan hanya admin yang bisa menarik uang
        $this->middleware('permission:can-withdraw', ['only' => ['update']]);
        $this->middleware('permission:can-send', ['only' => ['store']]);
    }

    /**
     * Menampilkan daftar transaksi kirim
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            // Jika admin, tampilkan semua transaksi
            $kirims = Kirim::with('santri', 'user')->get();
        } else {
            // Jika user biasa, hanya bisa melihat transaksi mereka sendiri
            $kirims = Kirim::where('user_id', Auth::id())->get();
        }

        return view('kirims.index', compact('kirims'));
    }

    /**
     * Menampilkan form untuk membuat transaksi kirim
     */
    public function create()
    {
        $santris = Santri::all(); // Ambil data santri
        return view('kirims.create', compact('santris'));
    }

    /**
     * Menyimpan transaksi kirim
     */
    public function store(Request $request)
    {
        $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'jumlah_bayar' => 'required|numeric',
            'jenis_transaksi' => 'required|in:kirim',
        ]);

        $kirim = Kirim::create([
            'santri_id' => $request->santri_id,
            'user_id' => Auth::id(), 
            'jumlah_bayar' => $request->jumlah_bayar,
            'jenis_transaksi' => 'kirim',
        ]);

        $santri = Santri::find($request->santri_id);
        $santri->saldo -= $request->jumlah_bayar;
        $santri->save();

        return redirect()->route('kirims.index')->with('success', 'Transaksi berhasil');
    }

    /**
     * Menampilkan form untuk menarik saldo
     */
    public function edit($id)
    {
        $kirim = Kirim::findOrFail($id);
        return view('kirims.edit', compact('kirim'));
    }

    /**
     * Memperbarui transaksi (untuk menarik saldo)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah_bayar' => 'required|numeric',
            'jenis_transaksi' => 'required|in:tarik',
        ]);

        $kirim = Kirim::findOrFail($id);

        // Memastikan hanya admin yang bisa melakukan penarikan
        if (!Auth::user()->hasRole('admin')) {
            return redirect()->route('kirims.index')->with('error', 'Hanya admin yang bisa melakukan penarikan.');
        }

        // Update saldo santri
        $santri = Santri::find($kirim->santri_id);
        $santri->saldo += $request->jumlah_bayar; // Menambah saldo
        $santri->save();

        // Update transaksi
        $kirim->jumlah_bayar = $request->jumlah_bayar;
        $kirim->jenis_transaksi = 'tarik'; // Ubah menjadi transaksi tarik
        $kirim->save();

        return redirect()->route('kirims.index')->with('success', 'Saldo berhasil ditarik');
    }
}