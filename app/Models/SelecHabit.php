<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecHabit extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'hb_id';

    protected $fillable = [
        'hb_name'
    ];
}
