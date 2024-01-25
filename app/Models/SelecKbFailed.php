<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecKbFailed extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'kbf_id';

    protected $fillable =
    [
        'kbf_name'
    ];
}
