<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecMenCy extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'mc_id';

    protected $fillable = [
        'mc_name'
    ];
}
