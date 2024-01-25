<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancNakes extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'nakes_id';

    protected $fillable = [
        'nakes_name',
        'nakes_nip',
        'nakes_sip',
        'nakes_sip_date',
        'nakes_telp',
        'nakes_province',
        'nakes_district',
        'nakes_subdistrict',
        'nakes_village',
        'nakes_rt',
        'nakes_rw',
        'nakes_address',
        'nakes_zip_code',
        'nakes_status',
        'nakes_user_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
