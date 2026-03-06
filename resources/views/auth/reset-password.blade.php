<x-layout-page page-title="Redefinir Senha - Espaço Terapêutico">
    <div class="min-h-screen flex flex-col justify-center items-center px-4">

        {{-- Card de Redefinição Estilo Glass --}}
        <div
            class="w-full max-w-md bg-white/60 backdrop-blur-xl rounded-[3rem] p-10 shadow-2xl shadow-blue-900/10 border border-white relative overflow-hidden">

            <div class="relative z-10">
                {{-- Cabeçalho --}}
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-orange-50 mb-4">
                        <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-slate-800">Nova Senha</h2>
                    <p class="text-[10px] text-slate-400 font-semibold uppercase tracking-[0.2em] mt-1">Crie uma senha
                        forte para proteger seu acesso.</p>
                </div>

                <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    {{-- E-mail (Somente leitura para segurança) --}}
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-400 uppercase tracking-widest ml-1">E-mail</label>
                        <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}"
                            required readonly
                            class="block w-full rounded-2xl border border-slate-200/30 bg-slate-50/50 px-5 py-4 text-sm text-slate-500 outline-none cursor-not-allowed" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    {{-- Nova Senha --}}
                    <div class="space-y-1">
                        <label class="text-xs font-bold uppercase tracking-widest ml-1">Nova
                            Senha</label>
                        <input id="password" type="password" name="password" required autofocus
                            autocomplete="new-password"
                            class="block w-full rounded-2xl border border-slate-200/50 bg-white/80 px-5 py-4 text-sm shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    {{-- Confirmar Nova Senha --}}
                    <div class="space-y-1">
                        <label class="text-xs font-bold uppercase tracking-widest ml-1">Confirmar
                            Senha</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            autocomplete="new-password"
                            class="block w-full rounded-2xl border border-slate-200/50 bg-white/80 px-5 py-4 text-sm shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    {{-- Botão de Ação --}}
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full bg-slate-900 text-white py-5 rounded-2xl font-bold shadow-xl shadow-slate-200 hover:bg-blue-600 transition-all duration-300 transform hover:-translate-y-1">
                            Atualizar Senha
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-page>
