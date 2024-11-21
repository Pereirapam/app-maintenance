<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>Você está na parte de tarefas!</p>


                        @if (session()->has('message'))
                        
                        {{ session('message') }}
                            
                        @endif



                    <a href="{{route('tasks.create')}}" class="">
                        <button type="button" class="bg-indigo-300 text-white w-100 h-100 font-semibold mt-8 mb-8 py-2 px-4 rounded hover:bg-indigo-500 transition duration-200">
                            Create new task
                        </button>
                    </a>

                    <table class="table-fixed min-w-full border-collapse border border-slate-500    ">
                        <thead>
                            <tr>
                              
                                <th class="border border-slate-600">Description</th>
                                <th class="border border-slate-600">idCategory</th>
                                <th class="border border-slate-600">Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tasks as $task)
                            <tr>
                             
                                <td class="border border-slate-700">{{ $task->description }}</td>
                                <td class="border border-slate-700">{{ $task->idCategory }}</td>
                                <td class="border border-slate-700">
                                    <a href="{{route('tasks.show', $task->id)}}">[show]</a>
                                    <a href="{{route('tasks.edit', $task->id)}}">[update]</a>
                                </td>
                            </tr>
                            @empty
                            <td>Não há tarefas para mostrar.</td>
                            @endforelse($tasks as $task)
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>