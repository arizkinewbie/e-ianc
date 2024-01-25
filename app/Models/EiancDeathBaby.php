<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancDeathBaby extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'detb_id';

    protected $fillable = [
        'detb_add_kode',
        'detb_month',
        'detb_year',
        'detb_destination',
        'detb_by_pneunomia',
        'detb_by_diare',
        'detb_by_tetanus_neonatorum',
        'detb_by_kel_sal_cerna',
        'detb_by_kelainan_saraf',
        'detb_by_kelainan_kongenital',
        'detb_by_other',
        'detb_bl_ispa',
        'detb_bl_diare',
        'detb_bl_malaria',
        'detb_bl_dbd',
        'detb_bl_typus',
        'detb_bl_kel_sal_cerna',
        'detb_bl_other',
        'detb_user_id',
    ];
}
