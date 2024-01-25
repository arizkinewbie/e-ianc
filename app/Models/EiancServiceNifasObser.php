<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancServiceNifasObser extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'sancno_id';

    protected $fillable = [
        'sancno_anc_d_id',
        'sancno_no_reg',
        'sancno_date',
        'sancno_day',
        'sancno_time',
        'sancno_type',
        'sancno_tensi',
        'sancno_nadi',
        'sancno_suhu',
        'sancno_cond',
        'sancno_laktasi',
        'sancno_perut',
        'sancno_fun_uteri',
        'sancno_kontraksi',
        'sancno_perineum',
        'sancno_lochea',
        'sancno_flatus',
        'sancno_miksi',
        'sancno_defiksi',
        'sancno_other',
        'sancno_user_id',
    ];
}
