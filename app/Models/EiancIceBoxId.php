<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancIceBoxId extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'ibi_id';

    protected $fillable = [
        'ibi_ins_id',
        'ibi_brand',
        'ibi_series',
        'ibi_source',
        'ibi_source_year',
        'ibi_user_id',
    ];
}
