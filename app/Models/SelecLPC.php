<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecLPC extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'lpc_id';

    protected $fillable = [
        'lpc_name'
    ];
}
