<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
    ];
    protected $casts=[
        'credentials'=>'array'
    ];
    public function logo():Attribute
    {
        return Attribute::make(
            get:fn($value)=> $value ? url('storage/'.$value) : null
        );
    }
}
