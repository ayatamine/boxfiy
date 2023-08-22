<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail,FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;
    public function canAccessFilament(): bool
    {
        if (!app()->environment('local')) {
            return str_ends_with($this->email, '@boxfiy.com');
        }
        return true;
        //&& $this->hasVerifiedEmail();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'thumbnail',
        'wallet_balance',
        'is_admin'
    ];
    protected static function booted()
    {
        static::creating(function ($user) {
            // Generate a username from the email address (example: john_doe)
            $username = strtolower(str_replace('.', '_', strtok($user->email, '@')));
            $user->username = $username;
        });
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $appends=['verified_email'];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function thumbnail(): Attribute
    {
        return Attribute::make(
            get: function ($value){
                if(Str::startsWith($value,'thumbnails')) return url('storage/'.$value);
                return generate_avatar(fullName());
            }
        );
    }
    public function verifiedEmail():Attribute
    {
        return Attribute::make(
            get: function($value){
                return !is_null($this->email_verified_at);
            }
        );
    }
}
