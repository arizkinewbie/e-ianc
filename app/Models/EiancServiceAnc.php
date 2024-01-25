<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancServiceAnc extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'sanc_id';

    protected $fillable = [
        'sanc_norm',
        'sanc_gravida',
        'sanc_partus',
        'sanc_aborsi',
        'sanc_partus',
        'sanc_life',
        'sanc_death',
        'sanc_hpht',
        'sanc_hpl',
        'sanc_pregnancy1_marriage',
        'sanc_pregnancy1_age',
        'sanc_distance_pregnancy',
        'sanc_pregnancy_failed',
        'sanc_born_with',
        'sanc_kia',
        'sanc_habit',
        'sanc_illness_experienced',
        'sanc_hereditary_disease',
        'sanc_menstrual_cycle',
        'sanc_hiv_aids',
        'sanc_user_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
