<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Str;


class PostSeeder extends Seeder
{
    public function run(): void
    {
        $user = \App\Models\User::where('usertype', 'admin')->first() ?? \App\Models\User::first();

        if (!$user) {
            $this->command->error("Peraí! Você precisa ter pelo menos um usuário no banco antes de rodar os posts.");
            return;
        }

        $userId = $user->id;
        
        $posts = [
           [
                'title' => 'A Importância do Brincar na Terapia ABA',
                'content' => "O brincar não é apenas diversão; é a ferramenta principal de aprendizado na Análise do Comportamento Aplicada (ABA). Através de atividades lúdicas, conseguimos trabalhar habilidades sociais, comunicação e redução de comportamentos desafiadores de forma leve e acolhedora.\n\nNo Espaço Terapêutico, cada sessão é planejada para que a criança se sinta motivada a aprender enquanto se diverte.",
                'published_at' => now(),
                'image_url' => 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?q=80&w=1000',
                'category' => 'Saúde & Bem-estar',
            ],
            [
                'title' => 'TDAH: Estratégias para o Dia a Dia Escolar',
                'content' => "Crianças com TDAH possuem um funcionamento cerebral único. Na escola, pequenas adaptações podem fazer grande diferença, como fragmentar tarefas longas em etapas menores e oferecer feedbacks constantes.\n\nNeste artigo, exploramos como a parceria entre família, escola e psicólogo é essencial para o sucesso acadêmico e emocional da criança.",
                'published_at' => now()->subDays(2),
                'image_url' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=1000',
                'category' => 'TDAH',
            ],
           [
                'title' => 'TDAH em Adultos: Muito além da desatenção',
                'content' => "O diagnóstico tardio de TDAH em adultos explica muitos desafios na carreira e nos relacionamentos. No Espaço Terapêutico, trabalhamos estratégias de organização e regulação emocional para melhorar sua qualidade de vida.",
                'published_at' => now()->subDays(20),
                'image_url' => 'https://images.unsplash.com/photo-1499750310107-5fef28a66643?q=80&w=1000', // Foto de escritório/adulto focado
                'category' => 'TDAH',
            ],
            [
                'title' => 'Sinais de Autismo em Bebês: O que Observar?',
                'content' => "O diagnóstico precoce é fundamental para o desenvolvimento da criança com TEA. Pais devem estar atentos a sinais como a ausência de contato visual persistente, não responder ao nome até os 12 meses e a falta de gestos sociais (como dar tchau ou apontar).\n\nIdentificar esses marcos precocemente permite que as intervenções comecem no período de maior plasticidade cerebral.",
                'published_at' => now()->subDays(7),
                'image_url' => 'https://images.unsplash.com/photo-1581349485608-9469926a8e5e?q=80&w=1000',
                'category' => 'TEA',
            ],
            [
                'title' => 'Como Lidar com Crises de Birra: Uma Abordagem Comportamental',
                'content' => "A birra é uma forma de comunicação para a criança que ainda não sabe expressar frustração. O primeiro passo é manter a calma e garantir a segurança. Evite ceder ao desejo da criança durante a crise, pois isso reforça o comportamento.\n\nApós o episódio, converse de forma simples sobre o que aconteceu, ajudando-a a nomear o que estava sentindo.",
                'published_at' => now()->subDays(10),
                'image_url' => 'https://images.unsplash.com/photo-1581952976147-5a2d15560349?q=80&w=1000', // Criança expressiva/sentimentos
                'category' => 'TEA',
            ],
            [
                'title' => 'A Importância da Rotina para Crianças com TDAH',
                'content' => "A previsibilidade reduz a ansiedade e ajuda na organização mental. Para crianças com TDAH, quadros de rotina visuais (com desenhos ou fotos) são ferramentas poderosas. Ter horários fixos para acordar, comer, estudar e brincar facilita a transição entre atividades.\n\nNo Espaço Terapêutico, ajudamos as famílias a estruturar esses ambientes de forma funcional.",
                'published_at' => now()->subDays(15),
                'image_url' => 'https://images.unsplash.com/photo-1484480974693-6ca0a78fb36b?q=80&w=1000', // Planejamento/Checklist
                'category' => 'TDAH',
            ],
            [
                'title' => 'Desenvolvimento da Linguagem: Quando Buscar Ajuda?',
                'content' => "Cada criança tem seu tempo, mas existem marcos esperados. Se aos 2 anos a criança fala poucas palavras ou não forma frases simples, pode ser o momento de uma avaliação fonoaudiológica e psicológica.\n\nA terapia ajuda a estimular a comunicação verbal e não-verbal, prevenindo isolamento social e frustrações futuras.",
                'published_at' => now()->subDays(20),
                'image_url' => 'https://images.unsplash.com/photo-1543269865-cbf427effbad?q=80&w=1000', // Criança e adulto conversando
                'category' => 'TEA',
            ],
            [
                'title' => 'Habilidades Sociais: Ensinando a Criança a Fazer Amigos',
                'content' => "Interagir com pares exige competências como saber esperar a vez, dividir brinquedos e entender expressões faciais. Através de grupos de habilidades sociais, utilizamos o 'treino' dessas situações em ambiente controlado.\n\nIsso fortalece a autoconfiança da criança para que ela consiga levar esses aprendizados para a escola e parques.",
                'published_at' => now()->subDays(25),
                'image_url' => 'https://images.unsplash.com/photo-1558021211-6d1403321394?q=80&w=1000', // Grupo de crianças brincando
                'category' => 'TEA',
            ],
        ];

        foreach ($posts as $post) {
            Post::create([
                'title'        => $post['title'],
                'content'      => $post['content'],
                'published_at' => $post['published_at'],
                'slug'         => \Illuminate\Support\Str::slug($post['title']), 
                'image_url'    => $post['image_url'] ?? null,
                'category'     => $post['category'] ?? null,
                'user_id'      => $userId,
            ]);
        }

    }
}
