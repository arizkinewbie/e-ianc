<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecPregMarr extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'pm_id';

    protected $fillable = [
        'pm_name'
    ];
}
