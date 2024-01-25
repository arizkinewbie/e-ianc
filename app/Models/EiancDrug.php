<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancDrug extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'dg_id';

    protected $fillable = [
        'dg_ins_id',
        'dg_code',
        'dg_type',
        'dg_brand',
        'dg_batch',
        'dg_netto',
        'dg_unit',
        'dg_received_date',
        'dg_expired_date',
        'dg_remainder',
        'dg_price',
        'dg_sell',
        'dg_user_id',
    ];
}
