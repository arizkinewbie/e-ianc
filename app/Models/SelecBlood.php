<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecBlood extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'blo_id';

    protected $fillable = [
        'blo_name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
