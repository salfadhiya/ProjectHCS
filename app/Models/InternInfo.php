<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternInfo extends Model
{
    use HasFactory;
    protected $table = 'intern_infos';

    protected $primaryKey = 'id_apply'; // Primary key adalah id_apply
    public $incrementing = true;
    protected $keyType = 'int';

    protected $guarded = [];

    public function onboarding()
{
    return $this->belongsTo(Onboarding::class, 'id_apply','id_apply');
}

}
