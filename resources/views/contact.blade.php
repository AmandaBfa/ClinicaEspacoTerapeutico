<x-navbar />

<x-layout-page page-title="Contato - Espaço Terapêutico">

    <div class="min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            {{-- Cabeçalho --}}
            <div class="text-center mb-12 mt-8">
                <h1 class="text-4xl font-bold text-gray-900">Entre em Contato</h1>
                <p class="mt-4 text-xl text-gray-600">Estamos prontos para acolher sua família.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-12">
                {{-- contact information --}}
                <div class="space-y-8">
                    {{-- phone --}}
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
                            <p class="text-gray-600">
                                {{ env('CLINICA_TELEFONE') }}
                            </p>
                            <p class="text-sm text-gray-400 mt-1">Atendimento de Seg a Sex, 09h às 18h</p>
                        </div>
                    </div>
                    {{-- email --}}
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
                            <p class="text-gray-600">{{ env('CLINICA_EMAIL') }}</p>
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
                            <p class="text-gray-600">
                                {{ env('CLINICA_ENDERECO') }}
                            </p>
                            <div class="mt-5">
                                <div class="w-full h-50 rounded-lg overflow-hidden border border-gray-200">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d15287.50596863448!2d-49.2537428!3d-16.6830628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x935ef1f9f66f4253%3A0x63c6596b9273f75d!2sEspa%C3%A7o%20Terap%C3%AAutico%20Karla%20Niana%2C%20R.%20C-139%2C%20853%20-%20Quadra%20341%20-%20Jardim%20Am%C3%A9rica%2C%20Goi%C3%A2nia%20-%20GO%2C%2074275-070!3m2!1d-16.7145862!2d-49.2834301!4m5!1s0x935ef1f9f66f4253%3A0x63c6596b9273f75d!2sEspa%C3%A7o%20Terap%C3%AAutico%20Karla%20Niana%2C%20R.%20C-139%2C%20853%20-%20Quadra%20341%20-%20Jardim%20Am%C3%A9rica%2C%20Goi%C3%A2nia%20-%20GO%2C%2074275-070!3m2!1d-16.7145862!2d-49.2834301!5e0!3m2!1spt-BR!2sbr!4v1772025115051!5m2!1spt-BR!2sbr"
                                        class="w-full h-full border-0" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-2 bg-blue-100 text-blue-600 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Envie seu Feedback</h3>
                    </div>

                    <form action="#" method="POST" class="space-y-4">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Seu Nome (Opcional)</label>
                                <input type="text" name="nome" placeholder="Anônimo"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 transition px-4 py-2 border" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tipo de Contato</label>
                                <select name="tipo" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 transition px-4 py-2 border bg-white">
                                    <option value="elogio">Elogio</option>
                                    <option value="sugestao">Sugestão</option>
                                    <option value="reclamacao">Reclamação</option>
                                    <option value="outro">Outro</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">E-mail para Retorno</label>
                            <input type="email" name="email" placeholder="email@exemplo.com"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 transition px-4 py-2 border" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Sua Mensagem</label>
                            <textarea name="mensagem" rows="4" required placeholder="Conte-nos como podemos melhorar..."
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 transition px-4 py-2 border"></textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-3 rounded-md font-bold hover:bg-blue-700 transition shadow-md hover:shadow-blue-200 mt-3">
                            Enviar para Ouvidoria
                        </button>

                        <p class="text-xs text-gray-400 text-center mt-4">
                            Sua opinião é fundamental para a evolução do nosso Espaço Terapêutico.
                        </p>
                    </form>
                </div>
            </div>

        </div>


    </div>
</x-layout-page>
