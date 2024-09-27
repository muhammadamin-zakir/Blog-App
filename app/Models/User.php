<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class User extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $fillable = ['name', 'password', 'email', 'role'];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'user_id');
    }
}
