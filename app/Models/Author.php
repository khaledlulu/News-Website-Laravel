<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

// use Illuminate\Database\Eloquent\Model;

class Author extends Authenticatable
{
    use HasFactory, HasRoles, HasApiTokens;
    public function user()
    {
        return $this->morphOne(User::class, 'actor', 'actor_type', 'actor_id', 'id');
    }
    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'author_categories',
            'author_id',
            'category_id',
            'id',
            'id'
        );
    }

    public function articles()
    {
        return $this->hasMany(Articles::class);
    }

    public function getFullNameAttribute()
    {
        return $this->user->first_name . ' ' . $this->user->last_name;
    }
    public function getImagesAttribute()
    {
        return $this->user->image;
    }
}
