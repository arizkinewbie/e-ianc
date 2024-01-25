<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancPatient extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'pat_id';

    protected $fillable = [
        'pat_norm',
        'pat_bpjs_kesehatan',
        'pat_nik',
        'pat_called',
        'pat_status',
        'pat_name',
        'pat_sex',
        'pat_religion',
        'pat_pob',
        'pat_dob',
        'pat_tob',
        'pat_age',
        'pat_year',
        'pat_month',
        'pat_day',
        'pat_education',
        'pat_blood',
        'pat_work',
        'pat_marital',
        'pat_address',
        'pat_rt',
        'pat_rw',
        'pat_village',
        'pat_subdistrict',
        'pat_district',
        'pat_province',
        'pat_zip_code',
        'pat_telp',
        'pat_biological_mother',
        'pat_thumb',
        'pat_husband',
        'pat_husband_work',
        'pat_husband_nik',
        'pat_wife',
        'pat_wife_work',
        'pat_wife_nik',
        'pat_mother',
        'pat_mother_work',
        'pat_mother_nik',
        'pat_father',
        'pat_father_work',
        'pat_father_nik',
        'pat_last_visit',
        'pat_ins',
        'pat_user_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
