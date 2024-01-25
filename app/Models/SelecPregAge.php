<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecPregAge extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'pa_id';

    protected $fillable = [
        'pa_name'
    ];
}
