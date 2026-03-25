<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        {{-- @include('layouts.navigation') --}}
        @if (Auth::check() && Auth::user()->usertype == 'admin' && request()->is('admin*'))
            @include('layouts.nav-admin')
        @else
            @include('layouts.navigation')
        @endif

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            <div class="bg-gradient-to-b from-blue-50 via-white to-orange-50 min-h-screen">
                {{ $slot }}
            </div>
        </main>
        @stack('scripts')
    </div>

    @if (session('success') || session('error'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 6000)" x-show="show"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 -translate-y-4 sm:translate-y-0 sm:translate-x-4"
            x-transition:enter-end="opacity-100 translate-y-0 sm:translate-x-0"
            x-transition:leave="transition ease-in duration-300 transform"
            x-transition:leave-start="opacity-100 translate-y-0 sm:translate-x-0"
            x-transition:leave-end="opacity-0 -translate-y-4 sm:translate-y-0 sm:translate-x-4"
            class="fixed top-4 left-1/2 -translate-x-1/2 sm:top-24 sm:right-5 sm:left-auto sm:translate-x-0 z-[100] flex flex-col gap-3 max-w-sm w-[90vw] sm:w-full">
            @if (session('success'))
                <div
                    class="bg-slate-900 border border-slate-700 text-white px-6 py-4 rounded-2xl shadow-2xl flex items-center gap-4 mt-10">
                    <div
                        class="w-10 h-10 rounded-full bg-green-500/20 text-green-400 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="flex-grow">
                        <h4 class="font-bold text-sm">Sucesso!</h4>
                        <p class="text-xs text-slate-300 mt-0.5 leading-tight">{{ session('success') }}</p>
                        @if (session('whatsapp_link'))
                            <a href="{{ session('whatsapp_link') }}" target="_blank"
                                class="mt-3 inline-flex items-center gap-1.5 bg-[#25D366] text-white px-3 py-1.5 rounded-lg text-xs font-bold hover:bg-[#1da851] transition shadow-lg shadow-[#25D366]/30">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12.031 21.055h-.008l-3.32-.894-3.565 1.156 1.171-3.473-.96-1.523A9.957 9.957 0 013.82 11.026c0-5.467 4.453-9.92 9.922-9.92 5.466 0 9.92 4.453 9.92 9.92 0 5.467-4.454 9.92-9.92 9.92m0-18A8.093 8.093 0 003.938 11.15a8.04 8.04 0 001.378 4.148L4.2 18.6l3.411-1.109a8.044 8.044 0 004.42 1.306 8.087 8.087 0 008.093-8.094A8.093 8.093 0 0012.03 3.055m4.312 11.234c-.237-.118-1.402-.693-1.618-.772-.216-.08-.374-.118-.532.118-.157.237-.61.772-.748.932-.138.158-.276.177-.513.06-.237-.119-1.0-.369-1.906-1.18-.703-.63-1.177-1.406-1.315-1.644-.138-.237-.015-.366.104-.484.106-.105.237-.276.355-.414.118-.138.157-.237.237-.395.079-.158.04-.296-.02-.415-.06-.118-.532-1.284-.73-1.758-.192-.46-.388-.399-.533-.406-.138-.007-.296-.008-.454-.008a.862.862 0 00-.632.296c-.217.237-.829.81-.829 1.975 0 1.165.849 2.29 9.967 2.448.513.73 1.579 1.183 2.132 1.183.553 0 1.402-.236 1.718-.948.316-.711.316-1.32.221-1.448-.095-.128-.355-.208-.592-.326" />
                                </svg>
                                Enviar WhatsApp
                            </a>
                        @endif
                    </div>
                    <button type="button" @click="show = false"
                        class="text-slate-400 hover:text-white shrink-0 transition p-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @endif

            @if (session('error'))
                <div
                    class="bg-red-50 border border-red-200 text-red-800 px-6 py-4 rounded-2xl shadow-2xl flex items-center gap-4">
                    <div
                        class="w-10 h-10 rounded-full bg-red-100 text-red-600 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex-grow">
                        <h4 class="font-bold text-sm">Atenção!</h4>
                        <p class="text-xs text-red-700 mt-0.5 leading-tight">{{ session('error') }}</p>
                    </div>
                    <button type="button" @click="show = false"
                        class="text-red-400 hover:text-red-600 shrink-0 transition p-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @endif
        </div>
    @endif
</body>

</html>
