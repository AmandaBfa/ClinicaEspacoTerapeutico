<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Service;
use App\Models\Feedback;
use App\Models\Agendamento;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalEmployees = Employee::count();
        $totalServices = Service::count();
        $mensagensPendentes = Feedback::where('lido', false)->count();
        $totalFeedbacks = Feedback::count();
        $agendamentosPendentes = Agendamento::where('status', 'solicitado')->count();

        $eventos = Agendamento::where('status', 'confirmado')
        ->with(['servico', 'profissional'])
        ->get()
        ->map(function($item) {
            return [
                'title' => $item->paciente_nome . " (" . ($item->servico->name ?? 'Serviço Excluído') . ")",
                'start' => $item->data_agendamento . 'T' . $item->horario_agendamento,
                'color' => '#3b82f6',
            ];
        });

        return view('admin.dashboard', compact('mensagensPendentes', 'totalEmployees', 'totalServices', 'totalFeedbacks', 'eventos', 'agendamentosPendentes'));
    }
}
