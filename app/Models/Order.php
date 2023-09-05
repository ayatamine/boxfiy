<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_number',
        'service_id',
        'user_id',
        'link',
        'amount',
        'price',
        'status',
        'was_refunded'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'service_id' => 'integer',
        'user_id' => 'integer',
        'amount' => 'double',
        'price' => 'double',
        'was_refunded'=>'boolean'
    ];
    public static string $CREATED='pending';
    static string $PROCESSING='processing';
    static string $PARTIAL='partial';
    static string $COMPLETED='completed';
    static string $CANCELED='canceled';
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
