<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserRole extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'user_role_id';

    protected $fillable = [
        'user_role_code',
        'user_role_name',
        'user_role_status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
