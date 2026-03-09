<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image_url',
        'category',
        'published_at',
        'user_id'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
