<x-layout-page page-title="Meu Perfil">
    <div class="py-12 pt-32 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            
            <div class="mb-8">
                @if(Auth::user()->usertype == 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="text-slate-400 hover:text-blue-600 font-bold text-sm uppercase tracking-widest transition-colors">&larr; Voltar ao Painel</a>
                @else
                    <a href="{{ route('agendamentos.historico') }}" class="text-slate-400 hover:text-blue-600 font-bold text-sm uppercase tracking-widest transition-colors">&larr; Voltar para Agendamentos</a>
                @endif
                <h2 class="text-4xl font-black text-slate-800 tracking-tighter mt-4">Meu Perfil</h2>
                <p class="text-slate-500 mb-10">Gerencie as informações da sua conta e a segurança do seu acesso.</p>
            </div>

            <div class="space-y-8">
                <div class="bg-white/60 backdrop-blur-xl border border-white/40 rounded-[2.5rem] p-8 md:p-10 shadow-xl shadow-blue-900/5">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="bg-white/60 backdrop-blur-xl border border-white/40 rounded-[2.5rem] p-8 md:p-10 shadow-xl shadow-blue-900/5">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="bg-white/60 backdrop-blur-xl border border-red-50 rounded-[2.5rem] p-8 md:p-10 shadow-xl shadow-red-900/5">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layout-page>
