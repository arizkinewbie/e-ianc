<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EiancTemoi extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'temoi_id';

    protected $fillable = [
        'temoi_ins_id',
        'temoi_nakes_id',
        'temoi_status',
        'temoi_user_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
