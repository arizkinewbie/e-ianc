<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancServiceNeoBb extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'neobb_id';

    protected $fillable =
    [
        'neobb_norm',
        'neobb_ins_id',
        'neobb_no_reg',
        'neobb_date',
        'neobb_type',
        'neobb_y',
        'neobb_m',
        'neobb_d',
        'neobb_insp_asi',
        'neobb_insp_mp_asi',
        'neobb_insp_sdi_dtk',
        'neobb_nut_weight',
        'neobb_nut_height',
        'neobb_nut_status',
        'neobb_nut_vit',
        'neobb_prog_semiologi_hiv',
        'neobb_prog_cd4',
        'neobb_prog_kelambu',
        'neobb_vacc',
        'neobb_det',
        'neobb_user_id'
    ];
}
