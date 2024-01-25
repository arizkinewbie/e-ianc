<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancServiceAncPhysicalExamination extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'sancpe_id';

    protected $fillable = [
        'sancpe_anc_d_id',
        'sancpe_date',
        'sancpe_weight',
        'sancpe_height',
        'sancpe_imt',
        'sancpe_weight_now',
        'sancpe_tt',
        'sancpe_nadi',
        'sancpe_r_rate',
        'sancpe_tempe',
        'sancpe_blood_pressure',
        'sancpe_awareness',
        'sancpe_body_shape',
        'sancpe_face',
        'sancpe_eye',
        'sancpe_tooth',
        'sancpe_mouth',
        'sancpe_arm',
        'sancpe_pelvis',
        'sancpe_chest',
        'sancpe_heart',
        'sancpe_lungs',
        'sancpe_patella',
        'sancpe_boobs',
        'sancpe_ex_top',
        'sancpe_ex_bottom',
        'sancpe_ex_gland',
        'sancpe_oodena',
        'sancpe_caesar',
        'sancpe_fetus',
        'sancpe_pros_fetus',
        'sancpe_pap',
        'sancpe_tfu_cm',
        'sancpe_tfu_finger',
        'sancpe_tfu_finger_pos',
        'sancpe_djj_id',
        'sancpe_djj',
        'sancpe_djj_desc',
        'sancpe_pl1',
        'sancpe_pl2',
        'sancpe_pl3',
        'sancpe_pl4',
        'sancpe_user_id',
    ];
}
