<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancIceBox extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'ib_id';

    protected $fillable = [
        'ib_ins_id',
        'ib_ibi_id',
        'ib_date',
        'ib_morning',
        'ib_afternoon',
        'ib_user_id',
    ];
}
