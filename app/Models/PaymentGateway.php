<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentGateway extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'unique_keyword',
        'credentials',
        'logo',
        'short_description',
        'status',
        'is_attached_with_spaceremit',
        'how_to_pay_description',
        'min_amount',
        'max_amount',
    ];
    protected $casts=[
        'credentials'=>'array',
        'is_attached_with_spaceremit'=>'boolean'
    ];
    public function logo():Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if($value)
                {
                    if(Request::segment(1) =='admin') return $value;
                    if(app()->isProduction()) return  url('storage/public/'.$value);
                    return url('storage/'.$value);
                }else return  null;
            }
        );
    }
}
