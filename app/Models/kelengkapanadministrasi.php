<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelengkapanadministrasi extends Model
{
    protected $fillable = [
        'id_peserta',
        'nama',
        'data_keaktifan',
        'status_kepesertaan',
        'periode_awal',
        'periode_akhir',
        'surat_keterangan_sehat',
        'sertifikat_vaksin',
        'background_checking',
        'surat_pengantar',
        'twibbon_in',
        'surat_pernyataan',
    ];
}
