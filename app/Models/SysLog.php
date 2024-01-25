<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SysLog extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'log_id';

    protected $fillable = [
        'log_ip',
        'log_browser',
        'log_os',
        'log_user_id',
        'log_action'
    ];
}
