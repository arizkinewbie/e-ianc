<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancVaksin extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'vak_id';

    protected $fillable = [
        'vak_ins_id',
        'vak_ib_id',
        'vak_type',
        'vak_brand',
        'vak_batch',
        'vak_received_date',
        'vak_expired_date',
        'vak_netto',
        'vak_unit',
        'vak_remainder',
        'vak_user_id',
    ];
}
