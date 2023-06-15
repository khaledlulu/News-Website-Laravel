<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorCategory extends Model
{
    use HasFactory;
    public function categories()
    {
        return $this->hasMany(
            Category::class,
            Author::class,
            'author_categories',
            'author_id',
            'category_id',
            'id',
            'id'
        );
    }
}
