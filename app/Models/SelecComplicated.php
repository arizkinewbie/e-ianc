<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecComplicated extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'com_id';

    protected $fillable = [
        'com_name'
    ];
}
