<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancKb extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'kb_id';

    protected $fillable = [
        'kb_ins_id',
        'kb_kbt_id',
        'kb_brand',
        'kb_batch',
        'kb_netto',
        'kb_unit',
        'kb_received_date',
        'kb_expired_date',
        'kb_remainder',
        'kb_user_id',
    ];
}
