<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SysBaseurl extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'url_id';

    protected $filable = [
        'url_use',
        'url_address',
        'url_status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
