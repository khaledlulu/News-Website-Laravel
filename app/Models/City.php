<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    //   api هان بكتب اسماء الاعمدة الي ما بدي اياها تظهر لما اعمل ال
    protected $hidden = [
        'updated_at', 'created_at',
    ];
}
