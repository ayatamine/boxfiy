<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'category_id',
        'min_qte',
        'max_qte',
        'price',
        'status',
        'type',
        'quality',
        'partial_process',
        'data_source',
        'api_id',
        'api_service_id',
        'description'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'category_id' => 'integer',
        'min_qte' => 'integer',
        'max_qte' => 'integer',
        'price' => 'double',
        'partial_process' => 'boolean',
        'api_id' => 'integer',
        'api_service_id' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function api(): BelongsTo
    {
        return $this->belongsTo(Api::class);
    }
}
