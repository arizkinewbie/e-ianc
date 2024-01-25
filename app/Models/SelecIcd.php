<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecIcd extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'icd_id';

    protected $fillable = [
        'icd_code',
        'icd_name'
    ];
}
