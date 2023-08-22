<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BallanceHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'transaction_type',
        'amount',
        'payment_gateway_id',
    ];
}
