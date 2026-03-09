<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feedback;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Feedback::create([
            'nome' => 'João Silva',
            'email' => 'joao@email.com',
            'assunto' => 'Elogio',
            'mensagem' => 'O atendimento da Karla é maravilhoso, me senti muito acolhido.',
            'lido' => false,
        ]);

        Feedback::create([
            'nome' => 'Maria Oliveira',
            'email' => 'maria@email.com',
            'assunto' => 'Sugestão',
            'mensagem' => 'Poderiam colocar mais horários disponíveis no período da noite?',
            'lido' => true,
        ]);

        Feedback::create([
            'nome' => 'Carlos Santos',
            'email' => 'carlos@email.com',
            'assunto' => 'Reclamação',
            'mensagem' => 'Tive dificuldade para encontrar o botão de cancelamento.',
            'lido' => false,
        ]);
    }
}
