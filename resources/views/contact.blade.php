<x-navbar />

<x-layout-app page-title="Contato - Espaço Terapêutico">
    <div class="min-h-screen bg-gray-50">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            {{-- Cabeçalho --}}
            <div class="text-center mb-16">
                <h1 class="text-4xl font-bold text-gray-900">Entre em Contato</h1>
                <p class="mt-4 text-xl text-gray-600">Estamos prontos para acolher sua família.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-12">
                {{-- Informações de Contato --}}
                <div class="space-y-8">
                    {{-- Telefone --}}
                    <div class="bg-white p-8 rounded-xl shadow-lg flex items-start space-x-6">
                        <div class="p-3 bg-orange-100 text-orange-500 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Telefone & WhatsApp</h3>
                            <p class="text-gray-600">(62) 99999-9999</p>
                            <p class="text-sm text-gray-400 mt-1">Atendimento de Seg a Sex, 09h às 18h</p>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="bg-white p-8 rounded-xl shadow-lg flex items-start space-x-6">
                        <div class="p-3 bg-blue-100 text-blue-600 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">E-mail</h3>
                            <p class="text-gray-600">contato@espacoterapeutico.com</p>
                        </div>
                    </div>

                    {{-- Localização --}}
                    <div class="bg-white p-8 rounded-xl shadow-lg flex items-start space-x-6">
                        <div class="p-3 bg-green-100 text-green-600 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Localização</h3>
                            <p class="text-gray-600">Setor Bueno<br />Goiânia - GO</p>
                        </div>
                    </div>
                </div>

                {{-- Formulário de Mensagem --}}
                <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Envie uma mensagem</h3>
                    <form action="#" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nome</label>
                            <input type="text" name="nome" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 transition px-4 py-2 border" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 transition px-4 py-2 border" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Mensagem</label>
                            <textarea name="mensagem" rows="4" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 transition px-4 py-2 border"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-3 rounded-md font-bold hover:bg-blue-700 transition shadow-md hover:shadow-blue-200">
                            Enviar Mensagem
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout-app>
