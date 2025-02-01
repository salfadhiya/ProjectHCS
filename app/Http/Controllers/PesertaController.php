<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Nilai;
use Illuminate\Support\Facades\Log; // Importing Log facade

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peserta = Peserta::all();
        return view('home.peserta.index', compact('peserta'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("home.peserta.tambah");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "id_apply" => "nullable|integer",
            "nomor_kartu" => "nullable|integer",
            "status_keaktifan" => "required|nullable|in:aktif,tidak aktif",
            "status_kepesertaan" => "required|nullable|in:PKL,KP,TA",
            "jk" => "required|nullable|in:laki laki,perempuan",
            "gdg_penempatan" => "nullable|string|max:255",
            "pembimbing_perusahaan" => "nullable|string|max:255",
            "unit_penempatan" => "nullable|string|max:255",
            "jenis_pekerjaan" => "nullable|string|max:255",
            "reguler_msib" => "required|in:Reguler,MSIB,Magenta",
            "email" => "nullable|email",
            "bulan_berakhir" => "nullable|in:Januari,Februari,Maret,April,Mei,Juni,Juli,Agustus,September,Oktober,November,Desember",
            "tahun_berakhir" => "nullable|integer|min:2000|max:3000"
        ], [
            'required'  => ':attribute wajib diisi!',
        ]);


        $peserta = Peserta::create([
            "id_apply" => $request->id_apply,
            "nomor_kartu" => $request->nomor_kartu,
            "status_keaktifan" => $request->status_keaktifan,
            "status_kepesertaan" => $request->status_kepesertaan,
            "jk" => $request->jk,
            "gdg_penempatan" => $request->gdg_penempatan,
            "pembimbing_perusahaan" => $request->pembimbing_perusahaan,
            "unit_penempatan" => $request->unit_penempatan,
            "jenis_pekerjaan" => $request->jenis_pekerjaan,
            "reguler_msib" => $request->reguler_msib,
            "email" => $request->email,
            "bulan_berakhir" => $request->bulan_berakhir,
            "tahun_berakhir" => $request->tahun_berakhir,
        ]);

        $peserta->nilai()->create([
            'penguasaan_bid_kerja' => 0,
            'kemampuan_pemecahan_masalah' => 0,
            'keterampilan_teknis' => 0,
            'kualitas_mutu_hasil_kerja' => 0,
            'ketepatan_waktu' => 0,
            'kejujuran' => 0,
            'kedisiplinan' => 0,
            'tanggung_jawab' => 0,
            'motivasi' => 0,
            'inisitatif' => 0,
            'kerja_sama_tim' => 0,
            'interaksi_sosial' => 0,
            'rata_rata' => 0,
            'jumlah' => 0,
        ]);

        return redirect('/peserta')->with('success', 'Form berhasil dikirim!');
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
        $peserta = Peserta::find($id);
        return view("home.peserta.edit", compact("peserta"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $peserta = Peserta::find($id);
        $peserta->update($request->all());
        return redirect('/peserta')->with("success", "Data berhasil diedit");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peserta = Peserta::find($id);
        $peserta->delete();

        $nilai = Nilai::where('id_peserta', $id)->first();
        $nilai->delete();

        return redirect("/peserta")->with("success", "Data berhasil dihapus");
    }

    public function nilai(string $id)
    {
        $peserta = Peserta::find($id);
        $nilai = Nilai::where('id_peserta', $id)->first();

        $fields = [
            'penguasaan_bid_kerja' => 'Penguasaan Bidang Kerja',
            'kemampuan_pemecahan_masalah' => 'Kemampuan Pemecahan Masalah',
            'keterampilan_teknis' => 'Keterampilan Teknis',
            'kualitas_mutu_hasil_kerja' => 'Kualitas Mutu Hasil Kerja',
            'ketepatan_waktu' => 'Ketepatan Waktu',
            'kejujuran' => 'Kejujuran',
            'kedisiplinan' => 'Kedisiplinan',
            'tanggung_jawab' => 'Tanggung Jawab',
            'motivasi' => 'Motivasi',
            'inisitatif' => 'Inisiatif',
            'kerja_sama_tim' => 'Kerja Sama Tim'
        ];

        $grades = [];
        foreach ($fields as $field => $label) {
            if ($nilai && isset($nilai->$field)) {
                $grades[$field] = $this->calculateGrade($nilai->$field);
            } else {
                $grades[$field] = '-';
            }
        }
        return view('home.peserta.nilai', compact('peserta', 'nilai', 'fields', 'grades'));
    }

    private function calculateGrade($value)
    {
        if ($value >= 91) {
            return 'A';
        } elseif ($value >= 81) {
            return 'B';
        } elseif ($value >= 71) {
            return 'C';
        } elseif ($value >= 61) {
            return 'D';
        } else {
            return 'E';
        }
    }

    public function nilaitambah(string $id)
    {
        $peserta = Peserta::find($id);

        if (!$peserta) {
            return redirect('/peserta')->with('error', 'Peserta tidak ditemukan');
        }

        $nilai = Nilai::where('id_peserta', $id)->first();

        if (!$nilai) {
            $nilai = Nilai::create([
                'id_peserta' => $id,
                'penguasaan_bid_kerja' => 0,
                'kemampuan_pemecahan_masalah' => 0,
                'keterampilan_teknis' => 0,
                'kualitas_mutu_hasil_kerja' => 0,
                'ketepatan_waktu' => 0,
                'kejujuran' => 0,
                'kedisiplinan' => 0,
                'tanggung_jawab' => 0,
                'motivasi' => 0,
                'inisitatif' => 0,
                'kerja_sama_tim' => 0,
                'rata_rata' => 0,
                'jumlah' => 0,
            ]);
        }

        $fields = [
            'penguasaan_bid_kerja' => 'Penguasaan Bidang Kerja',
            'kemampuan_pemecahan_masalah' => 'Kemampuan Pemecahan Masalah',
            'keterampilan_teknis' => 'Keterampilan Teknis',
            'kualitas_mutu_hasil_kerja' => 'Kualitas Mutu Hasil Kerja',
            'ketepatan_waktu' => 'Ketepatan Waktu',
            'kejujuran' => 'Kejujuran',
            'kedisiplinan' => 'Kedisiplinan',
            'tanggung_jawab' => 'Tanggung Jawab',
            'motivasi' => 'Motivasi',
            'inisitatif' => 'Inisiatif',
            'kerja_sama_tim' => 'Kerja Sama Tim'
        ];

        return view("home.peserta.nilaitambah", compact("peserta", "nilai", "fields"));
    }

    public function nilaisimpan(Request $request, string $id)
    {
    // Cari data nilai berdasarkan id_peserta
    $nilai = Nilai::where('id_peserta', $id)->first();

    // Jika tidak ditemukan, beri response error
    if (!$nilai) {
        return redirect()->back()->with('error', 'Data nilai tidak ditemukan.');
    }

    // Update data
    $nilai->update([
        'jumlah' => $request->jumlah,
        'rata_rata' => $request->rata_rata,
    ] + $request->except(['jumlah', 'rata_rata', 'id_peserta'])); // Kecuali jumlah & rata-rata, agar tetap dikirimkan

    return redirect('peserta/'.$id.'/nilai')->with('success', 'Nilai berhasil diperbarui!');
}
}
