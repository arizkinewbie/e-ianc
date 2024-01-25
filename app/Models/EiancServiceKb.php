<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancServiceKb extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'sanckb_id';

    protected $fillable = [
        'sanckb_ins_id',
        'sanckb_no_reg',
        'sanckb_date',
        'sanckb_norm',
        'sanckb_pay',
        'sanckb_nifas',
        'sanckb_life_male',
        'sanckb_life_female',
        'sanckb_last_soon',
        'sanckb_last_mens',
        'sanckb_just_marr',
        'sanckb_g',
        'sanckb_p',
        'sanckb_a',
        'sanckb_asi_went',
        'sanckb_diseases_yellow',
        'sanckb_diseases_bleeding',
        'sanckb_diseases_white',
        'sanckb_diseases_tumor',
        'sanckb_gen_dis',
        'sanckb_weight',
        'sanckb_blood_press',
        'sanckb_rahim',
        'sanckb_uidmow_radang',
        'sanckb_uidmow_tumor',
        'sanckb_mowmop_diabetes',
        'sanckb_mowmop_blood_froz',
        'sanckb_mowmop_orcepidi',
        'sanckb_mowmop_tumor',
        'sanckb_new_ordered',
        'sanckb_remove',
        'sanckb_allergy',
        'sanckb_compli',
        'sanckb_failed',
        'sanckb_allergy_id',
        'sanckb_compli_id',
        'sanckb_failed_id',
        'sanckb_respon',
        'sanckb_kbt_id',
        'sanckb_use',
        'sanckb_dosis',
        'sanckb_last_use',
        'sanckb_status',
        'sanckb_user_id',
    ];
}
