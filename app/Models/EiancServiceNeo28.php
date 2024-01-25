<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancServiceNeo28 extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'neo28_id';

    protected $fillable =
    [
        'neo28_norm',
        'neo28_ins_id',
        'neo28_no_reg',
        'neo28_date',
        'neo28_type',
        'neo28_visit',
        'neo28_weigth',
        'neo28_height',
        'neo28_temp',
        'neo28_freq_breath',
        'neo28_freq_heart',
        'neo28_infec',
        'neo28_iketrus',
        'neo28_diare',
        'neo28_asi',
        'neo28_vit',
        'neo28_vacc',
        'neo28_shk',
        'neo28_shk_tes',
        'neo28_shk_confrim',
        'neo28_shk_treatment',
        'neo28_user_id'
    ];
}
