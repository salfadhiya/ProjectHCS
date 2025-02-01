<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_peserta',
        'nama',
        'tanggal',
        'presensi',
        'jenis_absensi',
    ];

    // Relasi ke tabel Peserta
    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'id_peserta');
    }

    public function getJenisAbsensiAttribute($value)
{
    return match ($value) {
        'zumat' => 'Zumba Jumat',
        'zumin' => 'Zumba Senin',
        'lunch' => 'Makan Siang',
        default => $value,
    };
}

    
}