<div style="font-family: sans-serif; color: #334155; line-height: 1.6;">
    <h2 style="color: #ef4444;">Olá, {{ $nome }}</h2>

    <p>Informamos que sua solicitação de agendamento para <strong>{{ $servico }}</strong> no dia
        {{ $data }} não pôde ser confirmada.</p>

    <div style="background-color: #fef2f2; border-left: 4px solid #ef4444; padding: 20px; margin: 20px 0;">
        <p style="margin: 0; font-weight: bold; color: #991b1b; text-transform: uppercase; font-size: 12px;">Mensagem da
            nossa equipe:</p>
        <p style="margin-top: 10px; font-style: italic; color: #475569;">
            "{{ $motivo }}"
        </p>
    </div>

    <p>Para escolher uma nova data ou tirar dúvidas, por favor, entre em contato conosco.</p>

    <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 30px 0;">
    <p style="font-size: 12px; color: #94a3b8;">Atenciosamente,<br><strong>Equipe Espaço Terapêutico</strong></p>
</div>
