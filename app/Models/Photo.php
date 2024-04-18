<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;


class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'judulfoto',
        'deskripsifoto',
        'user_id'
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }


    public function likedByUser()
    {
        $user = auth()->user();
        return $user ? $this->likes()->where('user_id', $user->id)->exists() : false;
    }

}
