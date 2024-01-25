<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancDataSasaran extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'ds_id';

    protected $fillable = [
        'ds_add_kode',
        'ds_year',
        'ds_month',
        'ds_destination',
        'ds_resident',
        'ds_bumil',
        'ds_bumil_resti',
        'ds_bulin',
        'ds_bufas',
        'ds_pus',
        'ds_bayi_new',
        'ds_bayi',
        'ds_bayi_resti',
        'ds_balita',
        'ds_user_id',
    ];
}
