<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecVaksin extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'va_id';

    protected $fillable = [
        'va_name'
    ];
}
