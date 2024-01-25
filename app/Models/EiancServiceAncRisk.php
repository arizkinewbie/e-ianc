<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancServiceAncRisk extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'sancr_id';

    protected $fillable = [
        'sancr_anc_d_id',
        'sancr_no_reg',
        'sancr_awal',
        'sancr_ter_muda',
        'sancr_ter_tua',
        'sancr_ter_lam_h1',
        'sancr_ter_tua_h1',

        'sancr_ter_cep_ham',
        'sancr_ter_lam_ham',
        'sancr_ter_pen',
        'sancr_ter_ban_anak',
        'sancr_per_gag_ham',
        'sancr_per_lahir',

        'sancr_per_caesar',
        'sancr_pen_ham',
        'sancr_beng_mkmt',
        'sancr_td_ting',
        'sancr_ham_kembar',
        'sancr_ham_kembang',

        'sancr_bay_mati',
        'sancr_ham_leb_bulan',
        'sancr_let_sungsang',
        'sancr_let_lintang',
        'sancr_perdar_ham',
        'sancr_per_eks',
        'sancr_score',
        'sancr_user_id',
    ];
}
