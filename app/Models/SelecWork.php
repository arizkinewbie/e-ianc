<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecWork extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'w_id';

    protected $fillable = [
        'w_name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
