<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks'; // Nome da tabela no banco de dados
    protected $fillable = ['nome', 'email', 'assunto', 'mensagem', 'lido', 'prioridade', 'resposta_interna'];
}
