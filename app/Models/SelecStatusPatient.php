<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecStatusPatient extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'ssp_id';

    protected $fillable = [
        'ssp_name'
    ];
}
