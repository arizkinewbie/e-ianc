<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancServiceAncDetail extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'sancd_id';

    protected $fillable = [
        'sancd_anc_id',
        'sancd_norm',
        'sancd_date',
        'sancd_type',
        'sancd_visit',
        'sancd_no',
        'sancd_user_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
