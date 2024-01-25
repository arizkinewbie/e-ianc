<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancDesposisi extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'des_id';

    protected $fillable = [
        'des_reg_no',
        'des_norm',
        'des_ins_id',
        'des_de_id',
        'des_des_unit',
        'des_des_ins',
        'des_diagnose',
        'des_first_aid',
        'des_user_id',
    ];
}
