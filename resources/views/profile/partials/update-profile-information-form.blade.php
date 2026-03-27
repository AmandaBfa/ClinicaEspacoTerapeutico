<section>
    <header>
        <h2 class="text-2xl font-bold text-slate-800">
            Informações do Perfil
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Atualize as informações do seu perfil e endereço de e-mail.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" value="Nome Completo" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full rounded-2xl border-slate-200 focus:border-blue-500 focus:ring focus:ring-blue-200 transition-all" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" value="Endereço de E-mail" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full rounded-2xl border-slate-200 focus:border-blue-500 focus:ring focus:ring-blue-200 transition-all" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-slate-800">
                        Seu e-mail não está verificado.

                        <button form="send-verification" class="underline text-sm text-slate-600 hover:text-slate-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Clique aqui para reenviar o e-mail de verificação.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            Um novo link de verificação foi enviado para seu e-mail.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-slate-900 text-white px-6 py-2.5 rounded-xl font-bold hover:bg-blue-600 transition shadow-lg text-sm tracking-widest uppercase">Salvar Alterações</button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-bold"
                >Salvo com sucesso!</p>
            @endif
        </div>
    </form>
</section>
