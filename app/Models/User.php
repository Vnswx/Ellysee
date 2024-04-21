<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'alamat',
        'namalengkap',
        'password',
    ];

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

    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function likedPhotos()
    {
        return $this->belongsToMany(Photo::class, 'likes');
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
