<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Tarefa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="text-lg font-semibold mb-6">Editar Tarefa</p>

                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('put')

                        <div class="grid grid-cols-1 gap-4">
                         
                            <div>
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">
                                    Descrição
                                </label>
                                <input 
                                    type="text" 
                                    name="description" 
                                    id="description" 
                                    value="{{ old('description', $task->description) }}" 
                                    placeholder="Digite a descrição da tarefa"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>

                            <div>
                                <label for="idCategory" class="block mb-2 text-sm font-medium text-gray-900">
                                    Categoria
                                </label>
                                <select 
                                    name="idCategory" 
                                    id="idCategory" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                >
                                    <option value="" disabled>Selecione uma categoria</option>
                                    @forelse ($categories as $category)
                                        <option 
                                            value="{{ $category->id }}" 
                                            {{ $category->id == $task->idCategory ? 'selected' : '' }}
                                        >
                                            {{ $category->name }}
                                        </option>
                                    @empty
                                        <option value="">Não há categorias disponíveis</option>
                                    @endforelse
                                </select>
                            
                            </div>
                        </div>

                        <div class="mt-6">
                            <button 
                                type="submit" 
                                class="w-full sm:w-auto bg-blue-700 hover:bg-blue-800 text-white font-medium rounded-lg text-sm px-5 py-2.5 focus:ring-4 focus:ring-blue-300"
                            >
                                Atualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
