<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancServiceMarritalSkl extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'sancmskl_id';

    protected $fillable = [
        'sancmskl_marr_id',
        'sancmskl_no_reg',
        'sancmskl_name',
        'sancmskl_sex',
        'sancmskl_date',
        'sancmskl_time',
        'sancmskl_cond',
        'sancmskl_cond_baby',
        'sancmskl_weight',
        'sancmskl_height',
        'sancmskl_icd1',
        'sancmskl_icd2',
        'sancmskl_icd3',
        'sancmskl_icd4',
        'sancmskl_user_id',
    ];
}
