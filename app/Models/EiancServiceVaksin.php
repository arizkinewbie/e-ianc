<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancServiceVaksin extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'svak_id';

    protected $fillable = [
        'svak_ins_id',
        'svak_servak_id',
        'svak_date',
        'svak_pay',
        'svak_noka',
        'svak_norm',
        'svak_vak_id',
        'svak_dosis',
        'svak_temp',
        'svak_demam',
        'svak_bengkak',
        'svak_merah',
        'svak_muntah',
        'svak_lainnya',
        'svak_reg_no',
        'svak_user_id'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
