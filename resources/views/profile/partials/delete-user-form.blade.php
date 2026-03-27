<section class="space-y-6">
    <header>
        <h2 class="text-2xl font-bold text-red-600">
            Excluir Conta
        </h2>

        <p class="mt-1 text-sm text-red-500/80">
            Depois que sua conta for excluída, todos os seus recursos e dados serão excluídos permanentemente. Antes de excluir sua conta, baixe todos os dados ou informações que deseja reter.
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-50 text-red-600 border border-red-200 hover:bg-red-600 hover:text-white hover:border-red-600 transition-all px-6 py-2.5 rounded-xl font-bold text-sm tracking-widest uppercase shadow-sm"
    >Excluir Conta</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8">
            @csrf
            @method('delete')

            <h2 class="text-2xl font-black text-slate-800 tracking-tighter">
                Tem certeza que deseja excluir sua conta?
            </h2>

            <p class="mt-2 text-sm text-slate-500">
                Depois que sua conta for excluída, todos os seus recursos e dados serão permanentemente excluídos. Digite sua senha para confirmar que deseja excluir sua conta.
            </p>

            <div class="mt-8">
                <x-input-label for="password" value="Senha" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full rounded-2xl border-slate-200 focus:border-red-500 focus:ring focus:ring-red-200 transition-all p-3"
                    placeholder="Sua senha"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-500" />
            </div>

            <div class="mt-8 flex justify-end gap-3">
                <button type="button" x-on:click="$dispatch('close')" class="px-6 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold hover:bg-slate-200 transition-colors text-sm uppercase tracking-widest">
                    Cancelar
                </button>

                <button type="submit" class="px-6 py-3 bg-red-600 text-white rounded-xl font-bold hover:bg-red-700 transition-colors shadow-lg shadow-red-500/30 text-sm uppercase tracking-widest">
                    Excluir Conta
                </button>
            </div>
        </form>
    </x-modal>
</section>
