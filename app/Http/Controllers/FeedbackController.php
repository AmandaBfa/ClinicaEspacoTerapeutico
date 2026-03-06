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
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'assunto' => 'required|string|max:255',
            'mensagem' => 'required|string',
        ]);

        // sala no banco
        Feedback::create($request->all());

        // volta com mensagem de sucesso
        return back()->with('success', 'Sua mensagem foi enviada com sucesso! Logo entraremos em contato.');
    }
}
