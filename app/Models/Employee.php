<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
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
