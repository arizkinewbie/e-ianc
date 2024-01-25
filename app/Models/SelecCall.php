<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecCall extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'cal_id';

    protected $fillable = [
        'cal_name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
