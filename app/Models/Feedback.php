<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks'; // Nome da tabela no banco de dados
    protected $fillable = ['nome', 'email', 'nascimento', 'assunto', 'mensagem', 'status', 'lido', 'prioridade', 'resposta_interna'];
}
