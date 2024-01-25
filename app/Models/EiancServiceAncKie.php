<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancServiceAncKie extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'sanckie_id';

    protected $fillable = [
        'sanckie_anc_d_id',
        'sanckie_mat_ass',
        'sanckie_trans',
        'sanckie_sup_fe',
        'sanckie_food_cal_fe',
        'sanckie_phbs',
        'sanckie_mat_place',
        'sanckie_blood_bank',
        'sanckie_pmt',
        'sanckie_dan_hm',
        'sanckie_def_hiv',
        'sanckie_assis',
        'sanckie_kia_book',
        'sanckie_yodium',
        'sanckie_fis_hm',
        'sanckie_motiv_kdrt',
        'sanckie_tt',
        'sanckie_tt_no',
        'sanckie_preg_exer',
        'sanckie_ht_2',
        'sanckie_com_fetus',
        'sanckie_preg_class',
        'sanckie_music',
        'sanckie_imd',
        'sanckie_kolostrum',
        'sanckie_asi_6',
        'sanckie_asi_comp',
        'sanckie_asi_give',
        'sanckie_asi_went',
        'sanckie_boob_treatment',
        'sanckie_ht3',
        'sanckie_preg_iden',
        'sanckie_dan_nifas',
        'sanckie_fm',
        'sanckie_kb_nifas',
        'sanckie_user_id',
    ];
}
