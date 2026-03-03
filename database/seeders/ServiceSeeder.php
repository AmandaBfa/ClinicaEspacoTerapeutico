<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
           [
                'name' => 'Psicopedagogia',
                'description' => 'Acompanhamento especializado para o desenvolvimento dos processos de aprendizagem em diversas fases da vida.',
                'duration_minutes' => 60,
                'price' => 150.00,
            ],
            [
                'name' => 'Avaliação Neuropsicológica',
                'description' => 'Investigação detalhada das funções cognitivas para diagnóstico de TDAH, TEA e outros transtornos em crianças e adultos.',
                'duration_minutes' => 90,
                'price' => 450.00,
            ],
            [
                'name' => 'Psicoterapia Individual (TCC)',
                'description' => 'Atendimento baseado na Terapia Cognitivo-Comportamental para auxiliar no manejo de emoções e comportamentos para todas as idades.',
                'duration_minutes' => 50,
                'price' => 180.00,
            ],
            [
                'name' => 'Psicoterapia Adulta',
                'description' => 'Espaço de acolhimento e suporte para lidar com ansiedade, depressão e desafios da vida adulta com foco em autoconhecimento.',
                'duration_minutes' => 50,
                'price' => 180.00,
            ],
            [
                'name' => 'Psicoterapia Infantil',
                'description' => 'Espaço de acolhimento e suporte para lidar com ansiedade, depressão e desafios.',
                'duration_minutes' => 50,
                'price' => 170.00,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
