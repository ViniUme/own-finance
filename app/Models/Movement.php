<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $table = 'movements';
    protected $fillable = [
        'account_id',
        'currency_id',
        'category_id',
        'parent_id',
        'amount',
        'type',
        'description',
        'date',
        'previous_balance'
    ];
}
