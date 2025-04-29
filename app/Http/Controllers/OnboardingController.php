<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Onboarding;
use App\Models\InternInfo;

class OnBoardingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $onboarding = OnBoarding::all();
        return view('home.onboarding.index',compact('onboarding'));
    }

    public function interninfo(string $id_apply)
    {
        $interninfo = InternInfo::where('id_apply', $id_apply)->first();

        if (!$interninfo) {
            return redirect('/onboarding')->with('error', 'Data tidak ditemukan.');
        }

        return view('home.onboarding.interninfo', compact('interninfo'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.onboarding.tambah');
    }

    public function tambahinterninfo()
    {
        return view('home.onboarding.interntambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'nama' => 'required|string|max:255',
        //     'jurusan' => 'required|string|max:255',
        //     'no_telp' => 'required|numeric',
        //     'asal_instansi' => 'required|string|max:255',
        //     'tanggal_mulai' => 'required|date',
        //     'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
        // ]);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'no_telp' => 'required|numeric',
            'asal_instansi' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
        ], [
            'nama.required' => 'Nama peserta wajib diisi.',
            'nama.string' => 'Nama peserta harus berupa teks.',
            'nama.max' => 'Nama peserta maksimal 255 karakter.',

            'jurusan.required' => 'Jurusan peserta wajib diisi.',
            'jurusan.string' => 'Jurusan harus berupa teks.',
            'jurusan.max' => 'Jurusan maksimal 255 karakter.',

            'no_telp.required' => 'Nomor telepon wajib diisi.',
            'no_telp.numeric' => 'Nomor telepon hanya boleh berupa angka.',

            'asal_instansi.required' => 'Asal instansi wajib diisi.',
            'asal_instansi.string' => 'Asal instansi harus berupa teks.',
            'asal_instansi.max' => 'Asal instansi maksimal 255 karakter.',

            'tanggal_mulai.required' => 'Tanggal mulai wajib diisi.',
            'tanggal_mulai.date' => 'Tanggal mulai harus berupa format tanggal yang valid.',

            'tanggal_berakhir.required' => 'Tanggal berakhir wajib diisi.',
            'tanggal_berakhir.date' => 'Tanggal berakhir harus berupa format tanggal yang valid.',
            'tanggal_berakhir.after_or_equal' => 'Tanggal berakhir tidak boleh lebih awal dari tanggal mulai.',
        ]);

        $onboarding = OnBoarding::create([
            'nama' => $request-> nama,
            'jurusan' => $request-> jurusan,
            'no_telp' => $request-> no_telp,
            'asal_instansi' => $request-> asal_instansi,
            'tanggal_mulai' => $request-> tanggal_mulai,
            'tanggal_berakhir' => $request-> tanggal_berakhir,
        ]);

        InternInfo::create([
            'id_apply' => $onboarding->id_apply,
            'nomor_form' => $request->nomor_form ?? null,
            'nis_nim_nip' => $request->nis_nim_nip ?? null,
            'kompetensi_keahlian' => $request->kompetensi_keahlian ?? null,
            'kategori_peserta' => $request->kategori_peserta ?? null,
            'tanggal_pengajuan' => $request->tanggal_pengajuan ?? null,
            'nilai_psikotes' => $request->nilai_psikotes ?? null,
            'nilai_wawancara' => $request->nilai_wawancara ?? null,
            'hasil_seleksi' => $request->hasil_seleksi ?? null,
            'nomor_surat_konfirmasi' => $request->nomor_surat_konfirmasi ?? null,
            'tanggal_surat_konfirmasi' => $request->tanggal_surat_konfirmasi ?? null,
            'link_surat_konfirmasi' => $request->link_surat_konfirmasi ?? null,
        ]);

        return redirect('/onboarding')->with('success', 'Data berhasil ditambahkan!');
    }

    public function internsimpan(Request $request)
    {
        $request->validate([
            'nomor_form' => 'required|string',
            'nis_nim_nip' => 'required|integer',
            'kompetensi_keahlian' => 'required|string',
            'kategori_peserta' => 'required|string',
            'tanggal_pengajuan' => 'required|date',
            'nilai_psikotes' => 'required|integer',
            'nilai_wawancara' => 'required|integer',
            'hasil_seleksi' => 'required|string',
            'nomor_surat_konfirmasi' => 'required|string',
            'tanggal_surat_konfirmasi' => 'required|date',
            'link_surat_konfirmasi' => 'required|string',
        ]);

        $interninfo = InternInfo::create([
            'nomor_form' => $request->nomor_form,
            'nis_nim_nip' => $request->nis_nim_nip,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,
            'kategori_peserta' => $request->kategori_peserta,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'nilai_psikotes' => $request->nilai_psikotes,
            'nilai_wawancara' => $request->nilai_wawancara,
            'hasil_seleksi' => $request->hasil_seleksi,
            'nomor_surat_konfirmasi' => $request->nomor_surat_konfirmasi,
            'tanggal_surat_konfirmasi' => $request->tanggal_surat_konfirmasi,
            'link_surat_konfirmasi' => $request->link_surat_konfirmasi,
        ]);
        return redirect('/interninfo')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_apply)
    {
        $onboarding = OnBoarding::find($id_apply);
        return view('home.onboarding.edit', compact('onboarding'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_apply)
    {
        $onboarding = OnBoarding::findOrFail($id_apply); // Temukan berdasarkan ID
        return view('home.onboarding.edit', compact('onboarding')); // Tampilkan form edit
    }

    public function editinterninfo(string $id_apply)
    {
        $interninfo = InternInfo::findOrFail($id_apply); // Temukan berdasarkan ID
        return view('home.onboarding.internedit', compact('interninfo')); // Tampilkan form edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_apply)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|string|max:15',
            'no_telp' => 'required|string|max:255',
            'asal_instansi' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        // Temukan data yang ingin diupdate
        $onboarding = onboarding::findOrFail($id_apply);
        $onboarding->update([
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'no_telp' => $request->no_telp,
            'asal_instansi' => $request->asal_instansi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_berakhir' => $request->tanggal_berakhir,
        ]);

        return redirect('/onboarding')->with('success', 'Data berhasil diperbarui!');


        // $Onboarding = OnBoarding::find($id);
        // $Onboarding->update([
        //     'nama' => $request-> nama,
        //     'jurusan' => $request-> jurusan,
        //     'nomor_telepon' => $request-> nomor_telepon,
        //     'asal_instansi' => $request-> asal_instansi,
        //     'tanggal_mulai' => $request-> tanggal_mulai,
        //     'tanggal_berakhir' => $request-> tanggal_berakhir,
        // ]);
        // return redirect('/Onboarding')->with('succsess', 'Data berhasil diperbarui!');
    }

    public function updateinterninfo(Request $request, string $id_apply)
    {
        // Validasi input
        $request->validate([
            'nomor_form' => 'nullable|string|max:255',
            'nis_nim_nip' => 'nullable|integer',
            'kompetensi_keahlian' => 'nullable|string|max:255',
            'kategori_peserta' => 'nullable|string|max:255',
            'tanggal_pengajuan' => 'nullable|date',
            'nilai_psikotes' => 'nullable|integer',
            'nilai_wawancara' => 'nullable|integer',
            'hasil_seleksi' => 'nullable|string|max:255',
            'nomor_surat_konfirmasi' => 'nullable|string|max:255',
            'tanggal_surat_konfirmasi' => 'nullable|date',
            'link_surat_konfirmasi' => 'nullable|string|max:255',
        ]);

        // Temukan data yang ingin diupdate
        $interninfo = Interninfo::findOrFail($id_apply);
        $interninfo->update([
            'nomor_form' => $request->nomor_form,
            'nis_nim_nip' => $request->nis_nim_nip,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,
            'kategori_peserta' => $request->kategori_peserta,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'nilai_psikotes' => $request->nilai_psikotes,
            'nilai_wawancara' => $request->nilai_wawancara,
            'hasil_seleksi' => $request->hasil_seleksi,
            'nomor_surat_konfirmasi' => $request->nomor_surat_konfirmasi,
            'tanggal_surat_konfirmasi' => $request->tanggal_surat_konfirmasi,
            'link_surat_konfirmasi' => $request->link_surat_konfirmasi,
        ]);

        return redirect('/onboarding')->with('success', 'Data berhasil diperbarui!');


        // $Onboarding = OnBoarding::find($id);
        // $Onboarding->update([
        //     'nama' => $request-> nama,
        //     'jurusan' => $request-> jurusan,
        //     'nomor_telepon' => $request-> nomor_telepon,
        //     'asal_instansi' => $request-> asal_instansi,
        //     'tanggal_mulai' => $request-> tanggal_mulai,
        //     'tanggal_berakhir' => $request-> tanggal_berakhir,
        // ]);
        // return redirect('/Onboarding')->with('succsess', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_apply)
    {
         // Temukan data yang akan dihapus
         $onboarding = OnBoarding::findOrFail($id_apply);
         $onboarding->delete();

         return redirect('/onboarding')->with('success', 'Data berhasil dihapus!');
        // $Onboarding = OnBoarding::findOrFail($id);
        // $Onboarding->delete();

        // return redirect('/Onboarding')->with('success', 'Data berhasil dihapus!');
    }


}
