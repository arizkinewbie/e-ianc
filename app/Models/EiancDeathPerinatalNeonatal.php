<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancDeathPerinatalNeonatal extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'det_pn_id';

    protected $fillable = [
        'det_pn_add_kode',
        'det_pn_month',
        'det_pn_year',
        'det_pn_destination',
        'det_p_bblr',
        'det_p_asfiksia',
        'det_p_tetanus_neonatorum',
        'det_p_sepsis',
        'det_p_iketrus',
        'det_p_kel_kongenital',
        'det_p_other',
        'det_n_bblr',
        'det_n_asfiksia',
        'det_n_tetanus_neonatorum',
        'det_n_sepsis',
        'det_n_iketrus',
        'det_n_kel_kongenital',
        'det_n_other',
        'det_pn_user_id',
    ];
}
