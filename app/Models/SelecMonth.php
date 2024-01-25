<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecMonth extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'mon_id';

    protected $fillable = [
        'mon_name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
