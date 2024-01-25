<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancServiceNifasRecipe extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'sancnr_id';

    protected $fillable = [
        'sancnr_n_id',
        'sancnr_type',
        'sancnr_drug_id',
        'sancnr_qty',
        'sancnr_dosis',
        'sancnr_use',
        'sancnr_user_id',
    ];
}
