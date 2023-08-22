<?php

namespace App\Models;

use App\Models\TicketReply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ticket_category_id',
        'order_id',
        'user_id',
        'title',
        'content',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ticket_category_id' => 'integer',
        'order_id' => 'integer',
    ];
    protected static function booted()
    {
        static::creating(function ($ticket) {
            $ticket->user_id = auth()->id(); 
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(TicketCategory::class,'ticket_category_id','id');
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
    public function replies():HasMany
    {
        return $this->hasMany(TicketReply::class,'ticket_id','id');
    }
}
