<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecSex extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'sex_id';

    protected $fillable = [
        'sex_name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
