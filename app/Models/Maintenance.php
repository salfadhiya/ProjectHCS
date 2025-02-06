<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $table = 'maintenances';
    
    protected $fillable = [
        'id_peserta',
        'sakit',
        'izin',
        'alfa',
        'terlambat',
        'wfh',
        'project',
        'zumba',
        'dhuha',
        'sharing',
        'saction',
        'backchecking',
        'sp'
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'id_peserta', 'id_peserta');
    }
}
