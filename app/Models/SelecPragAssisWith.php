<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecPragAssisWith extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'paw_id';

    protected $fillable = [
        'paw_id'
    ];
}
