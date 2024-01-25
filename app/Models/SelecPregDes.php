<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecPregDes extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'pd_id';

    protected $fillable = [
        'pd_name'
    ];
}
