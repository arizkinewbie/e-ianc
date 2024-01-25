<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancServiceBaby extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'sbaby_id';

    protected $fillable = [
        'sbaby_ins_id',
        'sbaby_norm',
        'sbaby_no_reg',
        'sbaby_no',
        'sbaby_weight_born',
        'sbaby_height_born',
        'sbaby_cond',
        'sbaby_mat_assis',
        'sbaby_pragwith_id',
        'sbaby_asi',
        'sbaby_asi_give',
        'sbaby_age',
        'sbaby_weight_now',
        'sbaby_height_now',
        'sbaby_sym',
        'sbaby_physical',
        'sbaby_diagnose',
        'sbaby_drug_id',
        'sbaby_dosis',
        'sbaby_sugg',
        'sbaby_user_id',
    ];
}
