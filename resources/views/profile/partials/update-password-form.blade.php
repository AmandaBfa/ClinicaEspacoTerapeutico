<section>
    <header>
        <h2 class="text-2xl font-bold text-slate-800">
            Alterar Senha
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Garanta que sua conta use uma senha longa e aleatória para se manter segura.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" value="Senha Atual" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full rounded-2xl border-slate-200 focus:border-blue-500 focus:ring focus:ring-blue-200 transition-all" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-red-500" />
        </div>

        <div>
            <x-input-label for="update_password_password" value="Nova Senha" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full rounded-2xl border-slate-200 focus:border-blue-500 focus:ring focus:ring-blue-200 transition-all" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-red-500" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" value="Confirmar Nova Senha" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full rounded-2xl border-slate-200 focus:border-blue-500 focus:ring focus:ring-blue-200 transition-all" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-red-500" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-slate-900 text-white px-6 py-2.5 rounded-xl font-bold hover:bg-blue-600 transition shadow-lg text-sm tracking-widest uppercase">Atualizar Senha</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-bold"
                >Senha atualizada!</p>
            @endif
        </div>
    </form>
</section>
