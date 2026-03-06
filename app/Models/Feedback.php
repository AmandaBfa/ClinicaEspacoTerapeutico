<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = ['nome', 'email', 'assunto', 'mensagem', 'lido'];
}
