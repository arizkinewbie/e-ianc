<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecTypeInst extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'ti_id';

    protected $fillable = ['ti_name'];
}
