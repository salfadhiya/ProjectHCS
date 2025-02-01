<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_peserta';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'pesertas';

    protected $fillable = [
        'id_peserta',
        'id_apply',
        'nomor_kartu',
        'status_keaktifan',
        'status_kepesertaan',
        'jk',
        'gdg_penempatan',
        'pembimbing_perusahaan',
        'unit_penempatan',
        'jenis_pekerjaan',
        'reguler_msib',
        'email',
        'bulan_berakhir',
        'tahun_berakhir',
    ];

    protected static function boot()
{
    parent::boot();

    static::creating(function ($product) {
        $currentYear = date('y');
        $lastCustomer = Peserta::where('id_peserta', 'like', "P%$currentYear")
            ->orderBy('id_peserta', 'desc')
            ->first();

        $lastId = $lastCustomer ? intval(substr($lastCustomer->id_peserta, 2, 3)) : 0;
        $newId = str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);
        $product->id_peserta = 'P' . $newId . $currentYear;
    });
}

public function nilai()
{
    return $this->hasMany(Nilai::class, 'id_peserta', 'id_peserta');
}


}
