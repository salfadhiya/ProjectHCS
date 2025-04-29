<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\Absensi;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data rekapan beserta relasi peserta dan onboarding
        $rekapanData = Maintenance::with(['peserta.onboarding'])->get()->map(function ($rekapan) {
            // Mengambil id rekapan dan id peserta
            $idRekapan = $rekapan->id; // Tambahkan ini untuk mendapatkan ID rekapan
            $idPeserta = $rekapan->peserta->id_peserta;

            // Hitung jumlah kegiatan berdasarkan jenis_absensi di tabel absensis
            $zumbaCount = Absensi::where('id_peserta', $idPeserta)
                                 ->whereIn('jenis_absensi', ['zumat', 'zumin']) // Zumba tergantung jenisnya
                                 ->where('presensi', 'Hadir')
                                 ->count();

            $dhuhaCount = Absensi::where('id_peserta', $idPeserta)
                                 ->where('jenis_absensi', 'dhuha')
                                 ->where('presensi', 'Hadir')
                                 ->count();

            $safetyInductionCount = Absensi::where('id_peserta', $idPeserta)
                                          ->where('jenis_absensi', 'saction')
                                          ->where('presensi', 'Hadir')
                                          ->count();

            // Return data rekapan yang telah diperbarui
            return [
                'id' => $idRekapan, // Tambahkan ini untuk menyertakan ID rekapan
                'nama' => $rekapan->peserta->onboarding->nama ?? '-',
                'presensi' => $rekapan->peserta->id_peserta ?? '-',
                'status' => $rekapan->peserta->status_keaktifan ?? '-',
                'asal_instansi' => $rekapan->peserta->onboarding->asal_instansi ?? '-',
                'sakit' => $rekapan->sakit,
                'izin' => $rekapan->izin,
                'alfa' => $rekapan->alfa,
                'terlambat' => $rekapan->terlambat,
                'wfh' => $rekapan->wfh,
                'project' => $rekapan->project,
                'zumba' => $zumbaCount,  // Menggunakan jumlah dari Absensi
                'dhuha' => $dhuhaCount,  // Menggunakan jumlah dari Absensi
                'knowledge_sharing' => $rekapan->sharing === 'yes' ? 'Ya' : 'Tidak',
                'safety_induction' => $safetyInductionCount,  // Menggunakan jumlah dari Absensi
                'background_checking' => $rekapan->backchecking === 'yes' ? 'Ya' : 'Tidak',
                'surat_peringatan' => $rekapan->sp ?? '-'
            ];
        });

        // Kirim data ke view
        return view('home.rekapmain.index', compact('rekapanData'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    // Untuk halaman edit
    public function edit($id)
    {
        // Ambil data berdasarkan ID rekapan
        $maintenance = Maintenance::find($id);

        if (!$maintenance) {
            return redirect()->route('maintenance.index')->with('error', 'Data tidak ditemukan');
        }

        $idPeserta = $maintenance->peserta->id_peserta;

        // Hitung jumlah kegiatan berdasarkan jenis_absensi di tabel absensis
        $zumbaCount = Absensi::where('id_peserta', $idPeserta)
                             ->whereIn('jenis_absensi', ['zumat', 'zumin'])
                             ->where('presensi', 'Hadir')
                             ->count();

        $dhuhaCount = Absensi::where('id_peserta', $idPeserta)
                             ->where('jenis_absensi', 'dhuha')
                             ->where('presensi', 'Hadir')
                             ->count();

        $safetyInductionCount = Absensi::where('id_peserta', $idPeserta)
                                      ->where('jenis_absensi', 'saction')
                                      ->where('presensi', 'Hadir')
                                      ->count();

        // Kirim data ke view
        return view('home.rekapmain.edit', compact('maintenance', 'zumbaCount', 'dhuhaCount', 'safetyInductionCount'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input yang diterima dari form
        $validated = $request->validate([
            'sakit' => 'nullable|integer',
            'izin' => 'nullable|integer',
            'alfa' => 'nullable|integer',
            'terlambat' => 'nullable|integer',
            'wfh' => 'nullable|integer',
            'project' => 'nullable|integer',
            // Tambahkan validasi lain sesuai kebutuhan
        ]);

        // Cari data berdasarkan ID rekapan
        $maintenance = Maintenance::find($id);

        if (!$maintenance) {
            return redirect()->route('maintenance.index')->with('error', 'Data tidak ditemukan');
        }

        // Update data yang diberikan
        $maintenance->update([
            'sakit' => $request->input('sakit', $maintenance->sakit),
            'izin' => $request->input('izin', $maintenance->izin),
            'alfa' => $request->input('alfa', $maintenance->alfa),
            'terlambat' => $request->input('terlambat', $maintenance->terlambat),
            'wfh' => $request->input('wfh', $maintenance->wfh),
            'project' => $request->input('project', $maintenance->project),
            // Update field lain sesuai form yang diberikan
        ]);

        return redirect()->route('maintenance.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Temukan data berdasarkan ID rekapan
        $maintenance = Maintenance::find($id);

        if ($maintenance) {
            $maintenance->delete(); // Hapus data maintenance
            return redirect()->route('maintenance.index')->with('success', 'Data berhasil dihapus');
        }

        return redirect()->route('maintenance.index')->with('error', 'Data tidak ditemukan');
    }

}
