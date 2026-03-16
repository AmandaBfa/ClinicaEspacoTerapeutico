<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'email',
        'role',
        'bio',
        'specialties',
        'image_path',
        'instagram_url',
        'phone',
    ];
}
