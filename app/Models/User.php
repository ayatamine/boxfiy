<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'thumbnail'
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
}
