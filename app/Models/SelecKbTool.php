<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecKbTool extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'kbt_id';

    protected $fillable = [
        'kbt_name'
    ];
}
