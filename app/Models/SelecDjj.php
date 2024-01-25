<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecDjj extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'djj_id';

    protected $fillable = [
        'djj_name'
    ];
}
