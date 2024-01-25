<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecMarital extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'mar_id';

    protected $fillable = [
        'mar_name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
