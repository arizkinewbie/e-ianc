<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecPregWith extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'pw_id';

    protected $fillable = [
        'pw_name'
    ];
}
