<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancServiceNifasControl extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'sancnc_id';

    protected $fillable = [
        'sancnc_anc_d_id',
        'sancnc_no_reg',
        'sancnc_date',
        'sancnc_type',
        'sancnc_kasus',
        'sancnc_keluhan',
        'sancnc_diagnosis',
        'sancnc_visit',
        'sancnc_tindakan',
        'sancnc_user_id',
    ];
}
