<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancServiceAncLabImage extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'sancli_id';

    protected $fillable = [
        'sancli_lab_id',
        'sancli_image',
        'sancli_user_id',
    ];
}
