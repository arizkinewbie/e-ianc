<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancServiceMarrital extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'sancm_id';

    protected $fillable = [
        'sancm_anc_d_id',
        'sancm_no_reg',
        'sancm_norm',
        'sancm_date',
        'sancm_time',
        'sancm_met_marr',
        'sancm_kembar',
        'sancm_user_id',
    ];
}
