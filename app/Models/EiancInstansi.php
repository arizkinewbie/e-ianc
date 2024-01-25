<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancInstansi extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'ins_id';

    protected $fillable = [
        'ins_name',
        'ins_zip_code',
        'ins_type',
        'ins_province',
        'ins_district',
        'ins_subdistrict',
        'ins_village',
        'ins_rw',
        'ins_rt',
        'ins_address',
        'ins_telp',
        'ins_thumb',
        'ins_status',
        'ins_code',
        'ins_bpjs',
        'ins_user_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
