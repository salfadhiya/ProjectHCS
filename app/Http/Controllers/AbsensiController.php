<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Menampilkan daftar absensi.
     */
    public function index()
    {
        // Ambil semua data absensi dari database
        $absensis = Absensi::with('peserta')->get();

        // Tampilkan view dengan data absensi
        return view('home.absensi.index', compact('absensis'));
    }

    /**
     * Menampilkan form untuk membuat absensi baru.
     */
    public function create()
    {
        // Tampilkan view form create
        return view('home.absensi.form');
    }

    /**
     * Menyimpan absensi baru ke database.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // Validasi input
        $request->validate([
            'id_peserta' => 'required|string|exists:pesertas,id_peserta',
            'nama' => 'required|string',
            'tanggal' => 'required|date',
            'presensi' => 'required|in:Hadir,Tidak Hadir',
            'jenis_absensi' => 'required|in:zumat,zumin,jogging,dhuha,saction,lunch',
        ], [
            'id_peserta.exists' => 'ID Presensi salah atau tidak ada, Coba periksa kembali',
        ]);
        // Simpan data absensi ke database
        Absensi::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return view('home.absensi.succes');
    }

    /**
     * Menampilkan detail absensi.
     */
    public function show(Absensi $absensi)
    {
        // Tampilkan view detail dengan data absensi
        return view('absensi.show', compact('absensi'));
    }

    /**
     * Menampilkan form untuk mengedit absensi.
     */
    // public function edit(Absensi $absensi)
    // {
    //     // Tampilkan view form edit dengan data absensi
    //     return view('absensi.edit', compact('absensi'));
    // }

    // /**
   
    // public function update(Request $request, Absensi $absensi)
    // {
    //  }

    /**
     * Menghapus absensi dari database.
     */
    public function destroy(Absensi $absensi)
    {
        // Hapus data absensi dari database
        $absensi->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil dihapus.');
    }
}
