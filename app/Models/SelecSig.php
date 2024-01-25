<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecSig extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'ssig_id';

    protected $fillable = [
        'ssig_name'
    ];
}
