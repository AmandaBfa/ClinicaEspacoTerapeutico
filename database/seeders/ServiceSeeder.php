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
                'description' => 'Acompanhamento especializado para o desenvolvimento do seu filho.',
                'duration_minutes' => 60,
                'price' => 150.00,
            ],
            [
                'name' => 'Avaliação Neuropsicológica',
                'description' => 'Investigação detalhada das funções cognitivas para diagnóstico de TDAH, TEA e outros transtornos do neurodesenvolvimento.',
                'duration_minutes' => 90,
                'price' => 450.00,
            ],
            [
                'name' => 'Psicoterapia Infantil (TCC)',
                'description' => 'Atendimento baseado na Terapia Cognitivo-Comportamental para auxiliar no manejo de emoções e comportamentos.',
                'duration_minutes' => 50,
                'price' => 180.00,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
