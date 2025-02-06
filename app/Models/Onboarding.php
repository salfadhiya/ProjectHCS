<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Onboarding extends Model
{
    use HasFactory;

    protected $table = 'onboardings';

    protected $primaryKey = 'id_apply'; // Primary key adalah id_apply
    public $incrementing = true;
    protected $keyType = 'int';

    protected $guarded = [];

    // Relasi one-to-many ke Peserta
    public function peserta()
    {
        return $this->hasMany(Peserta::class, 'id_apply', 'id_apply'); // Relasi ke id_apply di Peserta
    }

    public function internInfos()
{
    return $this->hasMany(InternInfo::class, 'id_apply', 'id_apply');
}



}
