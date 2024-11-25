<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg flex">
                <div class="p-6 text-gray-900 w-full">
                    <p class="text-lg font-medium mb-6">Você está logado(a)!</p>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        
                        <div class="bg-white p-4 rounded shadow-lg flex flex-col items-left">
                            <img src="{{ asset('assets/img/photo-1595367283836-8a60810483ca.avif') }}" alt="Imagem de Tarefas" class="w-full h-32 object-cover rounded mb-4">
                            <h2 class="text-lg   font-bold mb-2">Tarefas</h2>
                            <p class="text-sm text-left">Gerencie todas as tarefas relacionadas à manutenção residencial.</p>
                            <a href="{{ route('tasks.index') }}" class="mt-4">
                                <button type="button" class="bg-blue-700 text-white font-semibold py-2 px-4 rounded hover:bg-blue-800 transition duration-200">
                                    Ir para Tarefas
                                </button>
                            </a>
                        </div>

                        <div class="bg-white p-4 rounded shadow-lg flex flex-col items-left">
                            <img src="{{ asset('assets/img/materials.avif') }}" alt="Imagem de Materiais" class="w-full h-32 object-cover rounded mb-4">
                            <h2 class="text-lg  font-bold mb-2">Materiais</h2>
                            <p class="text-sm text-left">Acompanhe os materiais necessários para cada 
                                <br>3 tarefa.</p>
                            <a href="{{ route('materials.index') }}" class="mt-4">
                                <button type="button" class="bg-blue-700 text-white font-semibold py-2 px-4 rounded hover:bg-blue-800 transition duration-200">
                                    Ir para Materiais
                                </button>
                            </a>
                        </div>

                        
                        <div class="bg-white p-4 rounded shadow-lg flex flex-col items-left">
                            <img src="{{ asset('assets/img/premium_photo-1661963876857-0cff8745a6af.avif') }}" alt="Imagem de Fornecedores" class="w-full h-32 object-cover rounded mb-4">
                            <h2 class="text-lg font-bold mb-2">Fornecedores</h2>
                            <p class="text-sm text-left">Encontre profissionais e fornecedores para ajudar nas manutenções.</p>
                            <a href="{{ route('providers.index') }}" class="mt-4">
                                <button type="button" class="bg-blue-700 text-white font-semibold py-2 px-4 rounded hover:bg-blue-800 transition duration-200">
                                    Ir para Fornecedores
                                </button>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
