<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancServiceAncTreatment extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'sanct_id';

    protected $fillable = [
        'sanct_anc_d_id',
        'sanct_tt',
        'sanct_tt_date',
        'sanct_arsip_kia',
        'sanct_kelambu',
        'sanct_user_id',
    ];
}
