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
    public static $CB = 'credit_ballance';
    public static $PURSHASE = 'create_order';
    public static $RETURN = 'return_order';
    public static $FROM_ADMIN = 'from_admin';

}
