<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Passport\HasApiTokens;
// use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class admin extends Authenticatable
{
    use HasFactory, HasRoles, HasApiTokens;
    public function user()
    {
        return $this->morphOne(User::class, 'actor', 'actor_type', 'actor_id', 'id');
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
