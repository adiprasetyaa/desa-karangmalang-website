<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $guarded = [];
    // has many category
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
