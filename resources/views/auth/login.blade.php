<x-layout-page page-title="Login - Espaço Terapêutico">
    <div class="min-h-screen flex flex-col justify-center items-center px-4">

        {{-- Card de Login Estilo Glass com Borda Delicada --}}
        <div
            class="w-full max-w-md bg-white/60 backdrop-blur-xl rounded-[3rem] p-10 shadow-2xl shadow-blue-900/10 border border-white relative overflow-hidden">

            {{-- Detalhe decorativo sutil --}}
            <div class="absolute -top-24 -right-24 w-48 h-48 bg-blue-100/30 rounded-full blur-3xl"></div>

            <div class="relative z-10">
                {{-- Cabeçalho --}}
                <div class="text-center mb-10">
                    <img src="{{ asset('assets/images/logo2.png') }}" class="w-16 h-16 mx-auto mb-4 opacity-80"
                        alt="Logo">
                    <h2 class="text-2xl font-bold text-slate-800">Bem-vindo(a)</h2>
                    <p class="text-[10px] text-slate-400 font-semibold uppercase tracking-[0.2em] mt-1">Acesse sua conta
                    </p>
                </div>

                {{-- Status de Sessão (ex: após reset de senha) --}}
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    {{-- E-mail --}}
                    <div class="space-y-1">
                        <label class="text-xs font-bold uppercase tracking-widest ml-1">E-mail</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus
                            autocomplete="username"
                            class="block w-full rounded-2xl border border-slate-200/50 bg-white/80 px-5 py-4 text-sm shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    {{-- Senha --}}
                    <div class="space-y-1">
                        <div class="flex justify-between items-center ml-1">
                            <label class="text-xs font-bold uppercase tracking-widest">Senha</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="text-[10px] font-bold text-blue-600 hover:underline uppercase tracking-tighter">Esqueceu?</a>
                            @endif
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="block w-full rounded-2xl border border-slate-200/50 bg-white/80 px-5 py-4 text-sm shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    {{-- Lembrar-me --}}
                    <div class="flex items-center ml-1">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="rounded border-slate-300 text-blue-600 shadow-sm focus:ring-blue-500">
                        <span class="ml-2 text-xs text-slate-500 font-medium">Manter conectado</span>
                    </div>

                    {{-- Botão de Entrada --}}
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full bg-slate-900 text-white py-5 rounded-2xl font-bold shadow-xl shadow-slate-200 hover:bg-blue-600 transition-all duration-300 transform hover:-translate-y-1">
                            Entrar no Sistema
                        </button>
                    </div>
                </form>

                <div class="mt-6 text-center border-t border-slate-100/50 pt-6">
                    <p class="text-md font-medium">Ainda não tem acesso?
                        <a href="{{ route('register') }}"
                            class="text-orange-500 font-bold hover:underline">Cadastre-se</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout-page>
