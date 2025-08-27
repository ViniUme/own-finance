<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'accounts';
    protected $fillable = [
        'id',
        'user_id',
        'currency_id',
        'name',
        'type',
        'color_hex',
        'current_balance'
    ];
}
