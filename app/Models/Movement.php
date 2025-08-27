<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'movements';
    protected $fillable = [
        'id',
        'account_id',
        'currency_id',
        'category_id',
        'amount',
        'type',
        'description',
        'date',
        'previous_balance'
    ];
}
