<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecKbEffect extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'kbe_id';

    protected $fillable =
    [
        'kbe_name',
    ];
}
