<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Identificação do Paciente
            $table->enum('paciente_tipo', ['proprio', 'dependente'])->default('dependente');
            $table->string('paciente_nome');
            $table->date('paciente_nascimento');
            $table->boolean('e_primeira_vez')->default(true);
            
            // Contato do Responsável
            $table->string('telefone_contato');
            $table->string('email_contato');

            // Dados do Atendimento
            $table->integer('profissional_id'); 
            $table->integer('servico_id');     
            $table->date('data_agendamento');
            $table->time('horario_agendamento');
            
            // Gestão
            $table->enum('status', ['solicitado', 'confirmado', 'cancelado', 'finalizado'])->default('solicitado');
            $table->text('observacoes')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};
