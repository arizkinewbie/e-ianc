<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecPragPlace extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'pl_id';

    protected $fillable = [
        'pl_name'
    ];
}
