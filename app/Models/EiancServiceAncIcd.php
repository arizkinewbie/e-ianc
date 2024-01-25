<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancServiceAncIcd extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'sancicd_id';

    protected $fillable = [
        'sancicd_anc_d_id',
        'sancicd_icd',
        'sancicd_user_id',
    ];
}
