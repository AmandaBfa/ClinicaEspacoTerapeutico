<div
    style="font-family: sans-serif; max-width: 600px; margin: 0 auto; border: 1px solid #e2e8f0; border-radius: 24px; overflow: hidden;">
    {{-- Header --}}
    <div style="background-color: #0f172a; padding: 40px; text-align: center; color: white;">
        <h1 style="margin: 0; font-size: 24px; letter-spacing: -1px;">Consulta Confirmada</h1>
        <p style="opacity: 0.7; font-size: 14px; margin-top: 10px;">Protocolo de Agendamento
            #{{ str_pad($id, 6, '0', STR_PAD_LEFT) }}</p>
    </div>

    {{-- Conteúdo --}}
    <div style="padding: 40px; background-color: white;">
        <p>Olá, <strong>{{ $nome }}</strong>,</p>
        <p>Sua solicitação foi revisada pela nossa equipe e o seu horário está garantido. Confira os detalhes abaixo:
        </p>

        {{-- Cartão do Comprovante --}}
        <div
            style="background-color: #f8fafc; border-radius: 16px; padding: 25px; margin: 30px 0; border: 1px dashed #cbd5e1;">
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="padding-bottom: 15px;">
                        <span
                            style="font-size: 10px; font-weight: bold; color: #94a3b8; text-transform: uppercase;">Serviço</span><br>
                        <span style="font-weight: bold; color: #1e293b;">{{ $servico }}</span>
                    </td>
                </tr>
                <tr>
                    <td style="padding-bottom: 15px;">
                        <span
                            style="font-size: 10px; font-weight: bold; color: #94a3b8; text-transform: uppercase;">Profissional</span><br>
                        <span style="font-weight: bold; color: #3b82f6;">{{ $profissional }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span
                            style="font-size: 10px; font-weight: bold; color: #94a3b8; text-transform: uppercase;">Data
                            e Horário</span><br>
                        <span style="font-weight: bold; color: #1e293b;">{{ $data }} às
                            {{ $hora }}</span>
                    </td>
                </tr>
            </table>
        </div>

        <p style="font-size: 13px; color: #64748b; line-height: 1.6;">
            <strong>Observação:</strong> Por favor, chegue com 10 minutos de antecedência. Caso precise desmarcar,
            pedimos que avise com 24h de antecedência pelo nosso WhatsApp.
        </p>
    </div>

    {{-- Footer --}}
    <div style="background-color: #f1f5f9; padding: 20px; text-align: center; font-size: 12px; color: #94a3b8;">
        <strong>Espaço Terapêutico</strong><br>
        Goiânia, GO - {{ date('Y') }}
    </div>
</div>
