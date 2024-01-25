<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancServiceAncTreatmentRecipe extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'sanctr_id';

    protected $fillable = [
        'sanctr_t_id',
        'sanctr_drug_id',
        'sanctr_qty',
        'sanctr_dosis',
        'sanctr_use',
        'sanctr_user_id',
    ];
}
