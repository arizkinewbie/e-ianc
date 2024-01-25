<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SysAlamat extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'kode',
        'nama'
    ];
}
