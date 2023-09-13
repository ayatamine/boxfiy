<?php

namespace App\Models;

use App\Models\User;
use App\Models\PaymentGateway;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BallanceHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'transaction_type',
        'amount',
        'payment_gateway_id',
    ];
    public static $CB = 'charge_ballance';
    public static $PURSHASE = 'create_order';
    public static $RETURN = 'return_from_order';
    public static $FROM_ADMIN = 'added_by_admin';

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function paymentGateway():BelongsTo
    {
        return $this->belongsTo(PaymentGateway::class,'payment_gateway_id','id');
    }
}
