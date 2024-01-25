<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecVaksinService extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'vas_id';

    protected $fillable = [
        'vas_name'
    ];
}
