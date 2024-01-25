<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancServiceAncDiagnosis extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'sancdi_id';

    protected $fillable = [
        'sancdi_anc_d_id',
        'sancdi_gpa',
        'sancdi_uk',
        'sancdi_disease_id',
        'sancdi_tcompli',
        'sancdi_compli',
        'sancdi_sugg',
        'sancdi_diag_marr',
        'sancdi_user_id',
    ];
}
