<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class AgendamentoController extends Controller
{
    public function create()
    {
        $servicos = Service::all(); 
        $profissionais = Employee::all();

        return view('agendamentos.create', compact('servicos', 'profissionais'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'paciente_tipo' => 'required',
            'paciente_nome' => 'required|string|max:255',
            'paciente_nascimento' => 'required|date',
            'servico_id' => 'required|exists:services,id',
            'profissional_id' => 'required|exists:profissionais,id',
            'data_agendamento' => 'required|date|after_or_equal:today',
            'horario_agendamento' => 'required',
            'telefone_contato' => 'required',
            'email_contato' => 'required|email',
            'observacoes' => 'nullable|string',
        ]);

        $dados['user_id'] = Auth::user()->id;
        $dados['status'] = 'solicitado';

        \App\Models\Agendamento::create($dados);

        return redirect()->route('home')->with('success', 'Sua solicitação de agendamento foi enviada! Aguarde nosso contato.');
    }
}
