<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>Edit the task {{$task->description}}</p>

                    @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error) 
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <div>
                        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <label for="description">Descrição</label>
                            <input type="text" name="description" id="description" value="{{ $task->description }}">
                            <label for="idCategory">Categoria</label>
                            <select name="idCategory" id="idCategory">
                                @forelse ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @empty
                                <option>Não há categorias</option>
                                @endforelse
                            </select>

                            <button type="submit">Criar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>