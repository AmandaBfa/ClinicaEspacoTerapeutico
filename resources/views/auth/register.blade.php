<x-layout-page page-title="Cadastro - Espaço Terapêutico">
    <div class="min-h-screen flex flex-col justify-center items-center px-4 py-12">

        {{-- Card de Registro Estilo Glass --}}
        <div
            class="w-full max-w-lg bg-white/60 backdrop-blur-xl rounded-[3rem] p-10 shadow-2xl shadow-blue-900/10 border border-white/50 relative overflow-hidden">

            {{-- Detalhe decorativo --}}
            <div class="absolute -bottom-24 -left-24 w-48 h-48 bg-orange-100/30 rounded-full blur-3xl"></div>

            <div class="relative z-10">
                {{-- Cabeçalho --}}
                <div class="text-center mb-10">
                    <img src="{{ asset('assets/images/logo2.png') }}" class="w-16 h-16 mx-auto mb-4 opacity-80"
                        alt="Logo">
                    <h2 class="text-2xl font-bold text-slate-800">Criar Conta</h2>
                    <p class="text-[10px] text-slate-400 font-semibold uppercase tracking-[0.2em] mt-1">Bem-vindo(a) ao
                        Espaço Terapêutico</p>
                </div>

                @if ($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-5 rounded-r-xl">
                        <p class="text-xs font-bold text-red-800 uppercase tracking-widest">Ops! Algo deu errado:</p>
                        <ul class="mt-1 text-xs text-red-700 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    {{-- Nome --}}
                    <div class="space-y-1">
                        <label class="text-xs font-bold uppercase tracking-widest ml-1">Nome
                            Completo</label>
                        <input id="name" type="text" name="name" :value="old('name')" required autofocus
                            class="block w-full rounded-2xl border-slate-200/50 bg-white/80 px-5 py-4 text-sm shadow-sm focus:ring-2 focus:ring-blue-500 transition-all" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    {{-- E-mail --}}
                    <div class="space-y-1">
                        <label class="text-xs font-bold uppercase tracking-widest ml-1">E-mail</label>
                        <input id="email" type="email" name="email" :value="old('email')" required
                            class="block w-full rounded-2xl border-slate-200/50 bg-white/80 px-5 py-4 text-sm shadow-sm focus:ring-2 focus:ring-blue-500 transition-all" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    {{-- Senha e Confirmação em Grid --}}
                    {{-- <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="text-xs font-bold uppercase tracking-widest ml-1">Senha</label>
                            <input id="password" type="password" name="password" required
                                class="block w-full rounded-2xl border-slate-200/50 bg-white/80 px-5 py-4 text-sm shadow-sm focus:ring-2 focus:ring-blue-500 transition-all" />
                        </div>

                        <div class="space-y-1">
                            <label class="text-xs font-bold uppercase tracking-widest ml-1">Confirmar</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                class="block w-full rounded-2xl border-slate-200/50 bg-white/80 px-5 py-4 text-sm shadow-sm focus:ring-2 focus:ring-blue-500 transition-all" />
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
                    {{-- Senha e Confirmação em Grid --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {{-- Campo Senha --}}
                        <div class="space-y-1">
                            <label class="text-xs font-bold uppercase tracking-widest ml-1">Senha</label>
                            <input id="password" type="password" name="password" required
                                class="block w-full rounded-2xl border-slate-200/50 bg-white/80 px-5 py-4 text-sm shadow-sm focus:ring-2 focus:ring-blue-500 transition-all {{ $errors->has('password') ? 'border-red-400 ring-1 ring-red-100' : '' }}" />

                            {{-- Mova o erro para cá --}}
                            <x-input-error :messages="$errors->get('password')" class="mt-1 ml-1" />
                        </div>

                        {{-- Campo Confirmação --}}
                        <div class="space-y-1">
                            <label class="text-xs font-bold uppercase tracking-widest ml-1">Confirmar</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                class="block w-full rounded-2xl border-slate-200/50 bg-white/80 px-5 py-4 text-sm shadow-sm focus:ring-2 focus:ring-blue-500 transition-all" />

                            {{-- Erro de confirmação (caso a senha não bata) --}}
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 ml-1" />
                        </div>
                    </div>

                    {{-- Botão Finalizar --}}
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full bg-slate-900 text-white py-5 rounded-2xl font-bold shadow-xl shadow-slate-200 hover:bg-blue-600 transition-all duration-300 transform hover:-translate-y-1">
                            Finalizar Cadastro
                        </button>
                    </div>
                </form>

                <div class="mt-8 text-center border-t border-slate-100 pt-6">
                    <p class="text-xs text-slate-400 font-medium">Já possui acesso ao sistema?
                        <a href="{{ route('login') }}" class="text-blue-600 font-bold hover:underline">Faça Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout-page>
