<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecEduca extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'edu_id';

    protected $fillable = [
        'edu_name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
