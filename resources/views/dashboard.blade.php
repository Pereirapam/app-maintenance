<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>Você está logado(a)!</p>

                    <a href="{{ route('tasks.index') }}">
                        <button type="button" class="bg-indigo-300 text-white w-100 h-100 font-semibold mt-8 py-2 px-4 rounded hover:bg-indigo-500 transition duration-200">
                            Ir para Tarefas
                        </button>
                    </a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>