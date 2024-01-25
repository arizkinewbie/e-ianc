<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecDespoisi extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'de_id';

    protected $fillable = [
        'de_name'
    ];
}
