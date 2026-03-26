<x-layout-page page-title="Recuperar Senha - Espaço Terapêutico">
    <div class="min-h-screen flex flex-col justify-center items-center px-4">

        {{-- Card de Recuperação Estilo Glass --}}
        <div
            class="w-full max-w-md bg-white/60 backdrop-blur-xl rounded-[3rem] p-10 shadow-2xl shadow-blue-900/10 border border-white relative overflow-hidden">

            <div class="relative z-10">
                {{-- Cabeçalho --}}
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-blue-50 mb-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-slate-800">Esqueceu a senha?</h2>
                    <p class="text-xs text-slate-500 mt-3 leading-relaxed">
                        Não se preocupe. Informe seu e-mail e enviaremos um link para você definir uma nova senha.
                    </p>
                </div>

                <x-auth-session-status
                    class="mb-4 bg-green-50 text-green-600 p-4 rounded-2xl text-xs font-medium border border-green-100"
                    :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf

                    {{-- E-mail --}}
                    <div class="space-y-1">
                        <label class="text-xs font-bold uppercase tracking-widest ml-1">E-mail
                            Cadastrado</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="block w-full rounded-2xl border bg-white/80 px-5 py-4 text-sm shadow-sm transition-all focus:outline-none {{ $errors->has('email') ? 'border-red-400 focus:border-red-500 focus:ring-2 focus:ring-red-100' : 'border-slate-200/50 focus:border-blue-500 focus:ring-2 focus:ring-blue-500' }}" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    {{-- Botão de Envio --}}
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full bg-slate-900 text-white py-5 rounded-2xl font-bold shadow-xl shadow-slate-200 hover:bg-blue-600 transition-all duration-300 transform hover:-translate-y-1">
                            Enviar Link de Redefinição
                        </button>
                    </div>
                </form>

                <div class="mt-6 text-center border-t border-slate-100/50 pt-6">
                    <a href="{{ route('login') }}"
                        class="text-md font-bold text-slate-400 hover:text-orange-600 transition-colors flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Voltar para o Login
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout-page>
