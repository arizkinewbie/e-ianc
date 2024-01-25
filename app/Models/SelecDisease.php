<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecDisease extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'sd_id';

    protected $fillable = [
        'sd_name'
    ];
}
