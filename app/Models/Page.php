<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','body'];
    // protected static function booted()
    // {
    //     static::creating(function ($page) {
    //         $slug = Str::slug($page->title);
    //         $page->slug = $slug;
    //     });
    // }
}
