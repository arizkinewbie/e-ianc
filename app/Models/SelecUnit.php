<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecUnit extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'u_id';

    protected $fillable = [
        'u_name',
        'u_status'
    ];
}
