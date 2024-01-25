<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancSig extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'sig_id';

    protected $fillable = [
        'sig_ins',
        'sig_type',
        'sig_nakes',
        'sig_user_id',
    ];
}
