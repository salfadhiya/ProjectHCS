<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = [
        "id_peserta",
        "penguasaan_bid_kerja",
        "kemampuan_pemecahan_masalah",
        "keterampilan_teknis",
        "kualitas_mutu_hasil_kerja",
        "ketepatan_waktu",
        "kejujuran",
        "kedisiplinan",
        "tanggung_jawab",
        "motivasi",
        "inisitatif",
        "kerja_sama_tim",
        "interaksi_sosial",
        "rata_rata",
        "jumlah",

    ];
    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'id_peserta', 'id');
    }
}
