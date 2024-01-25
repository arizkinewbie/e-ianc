<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancServiceAncAnamnesa extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'sanca_id';

    protected $fillable = [
        'sanca_anc_d_id',
        'sanca_date',
        'sanca_uk',
        'sanca_trimester',
        'sanca_lpc',
        'sanca_stomach',
        'sanca_dizzy',
        'sanca_gag',
        'sanca_appetite',
        'sanca_bleeding',
        'sanca_kdrt',
        'sanca_allergy',
        'sanca_complaint',
        'sanca_user_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
