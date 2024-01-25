<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecPragTrans extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'pt_id';

    protected $fillable = [
        'pt_name'
    ];
}
