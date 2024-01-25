<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecReligion extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'rel_id';

    protected $fillable = [
        'rel_name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
