<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountDegree extends Model
{
    use HasFactory;
    protected $fillable=[
       'title',
       'description',
        'balance_from',
        'balance_to',
        'properties',
    ];
    protected $casts=[
        'properties'=>'json'
    ]; 
}
