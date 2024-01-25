<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecKbKompli extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'kbk_id';

    protected $fillable =
    [
        'kbk_name'
    ];
}
