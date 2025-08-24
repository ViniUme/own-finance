<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';

    protected $fillable = [
        'user_id',
        'currency_id',
        'name',
        'type',
        'color_hex',
        'current_balance'
    ];
}
