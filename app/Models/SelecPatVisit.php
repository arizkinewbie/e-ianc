<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecPatVisit extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'spv_id';

    protected $fillable = [
        'spv_name'
    ];
}
