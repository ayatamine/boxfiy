<?php

namespace App\Models;

use App\Models\Api;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'description',
        'image',
        'avg_time',
        'rate'
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
        'rate' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function api(): BelongsTo
    {
        return $this->belongsTo(Api::class);
    }
    public function getImageAttribute($value)
    {
       
                if($value)
                {
                    if(Request::segment(1) =='admin') return $value;
                    if(app()->isProduction()) return  url('storage/public/'.$value);
                    return url('storage/'.$value);
                }else return  null;
            
    }
}
