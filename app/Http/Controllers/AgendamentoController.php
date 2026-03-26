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
        $horaFormatada = date('H:i:s', strtotime($request->horario_agendamento));
        $dataFormatada = $request->data_agendamento;
        $profissionalId = $request->profissional_id;
        $conflito = Agendamento::where('profissional_id', $profissionalId)
            ->whereDate('data_agendamento', $dataFormatada)
            ->where('horario_agendamento', $horaFormatada)
            ->whereIn('status', ['solicitado', 'confirmado'])
            ->exists();

        if ($conflito) {
            return back()
                ->withInput()
                ->with('error', 'Ops! Este horário já está ocupado ou aguardando confirmação. Por favor, escolha outro.');
        }

        $dados = $request->validate([
            'paciente_tipo' => 'required',
            'paciente_nome' => 'required|string|max:255',
            'paciente_nascimento' => 'required|date',
            'e_primeira_vez' => 'required|boolean',
            'servico_id' => 'required|exists:services,id',
            'profissional_id' => 'required|exists:employees,id',
            'data_agendamento' => 'required|date|after_or_equal:today',
            'horario_agendamento' => 'required',
            'telefone_contato' => 'required|string|min:10|max:15',
            'email_contato' => 'required|email',
            'observacoes' => 'nullable|string',
        ]);

        $dados['user_id'] = Auth::id();
        $dados['status'] = 'solicitado';
        $dados['horario_agendamento'] = $horaFormatada;

        Agendamento::create($dados);

        return redirect()->route('home')->with('success', 'Sua solicitação de agendamento foi enviada! Aguarde nosso contato.');
    }

    public function index(Request $request)
    {

        $query = Agendamento::with(['servico', 'user', 'profissional']);

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // $agendamentos = $query ->orderBy('data_agendamento', 'asc')
        //                         ->orderBy('horario_agendamento', 'asc')
        //                         ->paginate(15);

        $agendamentos = $query->latest()->paginate(15);

        $agendamentosPendentes = Agendamento::where('status', 'solicitado')->count();
        $agendamentosConfirmados = Agendamento::where('status', 'confirmado')->count();                
        $agendamentosCancelados = Agendamento::where('status', 'cancelado')->count();                

        return view('admin.agendamentos.index', compact('agendamentos', 'agendamentosPendentes', 'agendamentosConfirmados', 'agendamentosCancelados'));
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
        $agendamento->update(['status' => 'confirmado']);

        $dadosEmail = [
            'id' => $agendamento->id,
            'nome' => $agendamento->paciente_nome,
            'servico' => $agendamento->servico->name ?? 'Serviço Excluído',
            'profissional' => $agendamento->profissional->name ?? 'N/D',
            'data' => date('d/m/Y', strtotime($agendamento->data_agendamento)),
            'hora' => $agendamento->horario_agendamento
        ];

        Mail::send('emails.confirmacao', $dadosEmail, function($message) use ($agendamento) {
            $message->to($agendamento->email_contato)
                    ->subject('Consulta Confirmada - Espaço Terapêutico');
        });

        // envia mensagem pelo whatsapp
        $mensagemZap = "Olá, " . $agendamento->paciente_nome . "! Sua consulta de " . ($agendamento->servico->name ?? 'Serviço') . " no Espaço Terapêutico está confirmada para o dia " . $dadosEmail['data'] . " às " . $dadosEmail['hora'] . ". Estamos te esperando!";
        $telefoneLimpo = preg_replace('/\D/', '', $agendamento->telefone_contato);
        $telefone_contato = "https://wa.me/55" . $telefoneLimpo . "?text=" . urlencode($mensagemZap);

        return redirect()->route('admin.agendamentos.index')->with([
            'success' => 'Agendamento confirmado e e-mail enviado!',
            'whatsapp_link' => $telefone_contato
        ]);
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
            'servico' => $agendamento->servico->name ?? 'Serviço Excluído',
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

    public function showPaciente(Agendamento $agendamento)
    {
        if ($agendamento->user_id !== Auth::id()) {
            abort(403, 'Acesso negado.');
        }

        $agendamento->load(['servico', 'profissional']);
        return view('agendamentos.show', compact('agendamento'));
    }

    public function cancelarPaciente(Request $request, Agendamento $agendamento)
    {
        if ($agendamento->user_id !== Auth::id()) {
            abort(403, 'Acesso negado.');
        }

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
            'justificativa_cancelamento' => '[PACIENTE] ' . $request->justificativa
        ]);

        // 4. Envia o e-mail de cancelamento
        $dadosEmail = [
            'nome' => $agendamento->paciente_nome,
            'servico' => $agendamento->servico->name ?? 'Serviço Excluído',
            'motivo' => $request->justificativa,
            'data' => date('d/m/Y', strtotime($agendamento->data_agendamento))
        ];

        Mail::send('emails.cancelamento', $dadosEmail, function($message) use ($agendamento) {
            $message->to($agendamento->email_contato)
                    ->subject('Agendamento Cancelado - Espaço Terapêutico');
        });

        return back()->with('success', 'Agendamento cancelado com sucesso!');
    }

    public function horariosOcupados(Request $request)
    {
        $profissionalId = $request->profissional_id;
        $data = $request->data;

        if (!$profissionalId || !$data) {
            return response()->json([]);
        }

        $horarios = Agendamento::where('profissional_id', $profissionalId)
            ->whereDate('data_agendamento', $data)
            ->whereIn('status', ['solicitado', 'confirmado'])
            ->pluck('horario_agendamento')
            ->map(function ($hora) {
                return date('H:i', strtotime($hora));
            })
            ->toArray();

        return response()->json(array_values(array_unique($horarios)));
    }
}
