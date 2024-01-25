<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancServiceAncLab extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'sancl_id';

    protected $fillable = [
        'sancl_anc_d_id',
        'sancl_blood',
        'sancl_urine',
        'sancl_hiv',
        'sancl_blood_sugar',
        'sancl_bta',
        'sancl_malaria',
        'sancl_hbsag',
        'sancl_sifilis',
        'sancl_hb',
        'sancl_level_hb',
        'sancl_user_id',
    ];
}
