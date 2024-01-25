<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecTt extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'tt_id';

    protected $fillable = [
        'tt_name'
    ];
}
