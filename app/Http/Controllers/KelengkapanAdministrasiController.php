<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kelengkapanadministrasi;

class KelengkapanAdministrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
    {
        $kelengkapanadministrasi = Kelengkapanadministrasi::all();
        return view("home.kelengkapanadministrasi.index", compact("kelengkapanadministrasi"));
    }

    public function showForm()
    {
        return view('home.kelengkapanadministrasi.form');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{

    $validatedData = $request->validate([
        'id_peserta' => 'required|max:255',
        'nama' => 'required|min:3|max:255',
        'status_kepesertaan' => 'required',
        'periode_awal' => 'required|date',
        'periode_akhir' => 'required|date|after_or_equal:periode_awal',
        'surat_keterangan_sehat' => 'required',
        'surat_pengantar' => 'required',
        'twibbon_in' => 'required|min:3',
        'surat_pernyataan' => 'required'
    ]);

    $validatedData['surat_keterangan_sehat'] = $request->file('surat_keterangan_sehat')->store('surat_keterangan_sehat', 'public');
    $validatedData['surat_pengantar'] = $request->file('surat_pengantar')->store('surat_pengantar', 'public');
    $validatedData['surat_pernyataan'] = $request->file('surat_pernyataan')->store('surat_pernyataan', 'public');

    KelengkapanAdministrasi::create($validatedData);
    return redirect('/kelengkapanadministrasi/success')->with('success', 'Form berhasil dikirim!');


}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kelengkapanadministrasi = KelengkapanAdministrasi::find($id);
        return view('home.kelengkapanadministrasi.edit', compact('kelengkapanadministrasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function detail(string $id)
    {

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


    $kelengkapanadministrasi = KelengkapanAdministrasi::findOrFail($id);
    $kelengkapanadministrasi->delete();

    return redirect('/kelengkapanadministrasi')->with('success', 'Data berhasil dihapus!');


    }




}
