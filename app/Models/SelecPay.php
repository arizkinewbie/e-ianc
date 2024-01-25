<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SelecPay extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'pay_id';

    protected $fillable = [
        'pay_name'
    ];
}
