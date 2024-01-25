<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancDeathMaternal extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'detm_id';

    protected $fillable = [
        'detm_add_kode',
        'detm_month',
        'detm_year',
        'detm_destination',
        'detm_pendarahan',
        'detm_eklamsi',
        'detm_infeksi',
        'detm_abortus',
        'detm_partus_lama',
        'detm_trauma_obsetrik',
        'detm_komplikasi_puerperium',
        'detm_other',
        'detm_user_id',
    ];
}
