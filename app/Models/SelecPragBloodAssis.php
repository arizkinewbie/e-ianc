<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecPragBloodAssis extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'pda_id';

    protected $fillable = [
        'pda_name'
    ];
}
