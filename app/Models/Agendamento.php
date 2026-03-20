<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Agendamento extends Model
{
    protected $fillable = [
        'user_id',
        'paciente_tipo',
        'paciente_nome',
        'paciente_nascimento',
        'e_primeira_vez',
        'telefone_contato',
        'email_contato',
        'profissional_id',
        'servico_id',
        'data_agendamento',
        'horario_agendamento',
        'status',
        'observacoes'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function servico(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'servico_id');
    }

    public function profissional(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'profissional_id');
    }
}
