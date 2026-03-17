<?php

namespace App\Http\Controllers;
use App\Models\Feedback;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        // validação
        $request->validate([
            'nome' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'nascimento' => 'required|date|max:255',
            'assunto' => 'required|string|max:255',
            'mensagem' => 'required|string|min:5',

        ]);

        // sala no banco
        Feedback::create($request->all());

        // volta com mensagem de sucesso
        return back()->with('success', 'Sua mensagem foi enviada com sucesso! Logo entraremos em contato.');
    }

    public function index()
    {
        $feedbacks = Feedback::latest()->get();
        return view('admin.ouvidoria', compact('feedbacks'));
    }

    public function updateLido(Request $request, Feedback $feedback)
    {
        $feedback->update([
            'lido' => $request->has('lido') ? $request->lido : $feedback->lido,
            'prioridade' => $request->prioridade ?? $feedback->prioridade,
        ]);

        return back()->with('success', 'Status atualizado com sucesso!');
    }

    public function responder(Request $request, Feedback $feedback)
    {
        $request->validate(['resposta_interna' => 'required|string']);
        
        $feedback->update([
            'resposta_interna' => $request->resposta_interna,
            'lido' => true 
        ]);

        return redirect()->route('admin.ouvidoria')->with('success', 'Resposta registrada!');
    }

    public function show(Feedback $feedback)
    {
        $feedback->update(['lido' => true]);
        
        return view('admin.ouvidoria-show', compact('feedback'));
    }

    public function updateStatus(Request $request, Feedback $feedback)
    {
        $feedback->update(['status' => $request->status]);
        return back()->with('success', 'Alteração salva com sucesso!');
    }

}
