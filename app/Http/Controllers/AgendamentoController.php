<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Employee;
use App\Models\Agendamento;
use Illuminate\Support\Facades\Mail;
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
            'e_primeira_vez' => 'required|boolean',
            'servico_id' => 'required|exists:services,id',
            'profissional_id' => 'required|exists:employees,id',
            'data_agendamento' => 'required|date|after_or_equal:today',
            'horario_agendamento' => 'required|date_format:H:i',
            'telefone_contato' => 'required|string|min:10|max:15',
            'email_contato' => 'required|email',
            'observacoes' => 'nullable|string',
        ]);

        $conflito = Agendamento::where('profissional_id', $request->profissional_id)
        ->where('data_agendamento', $request->data_agendamento)
        ->where('horario_agendamento', $request->horario_agendamento)
        ->where('status', '!=', 'cancelado')
        ->exists();

        if ($conflito) {
            return back()->withErrors(['horario_agendamento' => 'Este horário já está ocupado com este profissional. Escolha outro.']);
        }

        $profissional = Employee::find($request->profissional_id);

        if (!$profissional) {
            return back()->withErrors(['profissional_id' => 'Profissional inválido']);
        }

        // if (!$profissional->services()->where('id', $request->servico_id)->exists()) {
        //     return back()->withErrors([
        //         'servico_id' => 'Este profissional não atende esse serviço.'
        //     ]);
        // }

        $dados['user_id'] = Auth::user()->id;
        $dados['status'] = 'solicitado';

        Agendamento::create($dados);

        return redirect()->route('home')->with('success', 'Sua solicitação de agendamento foi enviada! Aguarde nosso contato.');
    }

    public function index()
    {
        $agendamentos = Agendamento::with(['servico', 'user', 'profissional'])
            ->orderBy('data_agendamento', 'asc')
            ->orderBy('horario_agendamento', 'asc')
            ->paginate(15);

        return view('admin.agendamentos.index', compact('agendamentos'));
    }

    public function updateStatus(Request $request, Agendamento $agendamento)
    {
        $request->validate([
            'status' => 'required|in:solicitado,confirmado,cancelado'
        ]);
        $agendamento->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status do agendamento atualizado!');
    }

    public function show(Agendamento $agendamento)
    {
        $agendamento->load(['servico', 'user', 'profissional']);
        return view('admin.agendamentos.show', compact('agendamento'));
    }

    public function confirmarFinal(Request $request, Agendamento $agendamento)
    {
        if ($agendamento->status !== 'solicitado') {
            return back()->with('error', 'Este agendamento já foi processado anteriormente.');
        }
        // 1. Atualiza o status no banco
        $agendamento->update(['status' => 'confirmado']);

        // 2. Envia o E-mail para o paciente
        $dadosEmail = [
            'id' => $agendamento->id,
            'nome' => $agendamento->paciente_nome,
            'servico' => $agendamento->servico->title,
            'profissional' => $agendamento->profissional->nome,
            'data' => date('d/m/Y', strtotime($agendamento->data_agendamento)),
            'hora' => $agendamento->horario_agendamento
        ];

        Mail::send('emails.confirmacao', $dadosEmail, function($message) use ($agendamento) {
            $message->to($agendamento->email_contato)
                    ->subject('Consulta Confirmada - Espaço Terapêutico');
        });

        return redirect()->route('admin.agendamentos.index')->with('success', 'Agendamento confirmado e e-mail enviado!');
    }

    public function recusar(Request $request, Agendamento $agendamento)
    {
        $request->validate([
            'justificativa' => 'required|string|min:5'
        ]);

        $agendamento->update([
            'status' => 'cancelado',
            'justificativa_cancelamento' => $request->justificativa
        ]);

        $dadosEmail = [
            'nome' => $agendamento->paciente_nome,
            'servico' => $agendamento->servico->title,
            'motivo' => $request->justificativa,
            'data' => date('d/m/Y', strtotime($agendamento->data_agendamento))
        ];

        Mail::send('emails.cancelamento', $dadosEmail, function($message) use ($agendamento) {
            $message->to($agendamento->email_contato)
                    ->subject('Informação sobre seu agendamento - Espaço Terapêutico');
        });

        return redirect()->route('admin.agendamentos.index')->with('success', 'Agendamento cancelado e e-mail enviado.');
    }

    public function historicoAgendamentos()
    {
        $user = Auth::user();
        $agendamentos = Agendamento::where('user_id', $user->id)
            ->with(['servico', 'profissional'])
            ->orderBy('data_agendamento', 'desc')
            ->paginate(10);

        return view('agendamentos.historico', compact('agendamentos'));
    }

    public function cancelarPaciente(Request $request, Agendamento $agendamento)
    {
        // 1. Validação: Só pode cancelar se estiver "solicitado"
        if ($agendamento->status !== 'solicitado') {
            return back()->with('error', 'Este agendamento não pode ser cancelado (já foi confirmado ou cancelado anteriormente).');
        }

        // 2. Validação do motivo
        $request->validate([
            'justificativa' => 'required|string|min:5'
        ]);

        // 3. Atualiza o status para cancelado
        $agendamento->update([
            'status' => 'cancelado',
            'justificativa_cancelamento' => $request->justificativa
        ]);

        // 4. Envia o e-mail de cancelamento
        $dadosEmail = [
            'nome' => $agendamento->paciente_nome,
            'servico' => $agendamento->servico->title,
            'motivo' => $request->justificativa,
            'data' => date('d/m/Y', strtotime($agendamento->data_agendamento))
        ];

        Mail::send('emails.cancelamento', $dadosEmail, function($message) use ($agendamento) {
            $message->to($agendamento->email_contato)
                    ->subject('Agendamento Cancelado - Espaço Terapêutico');
        });

        return back()->with('success', 'Agendamento cancelado com sucesso!');
    }
}
