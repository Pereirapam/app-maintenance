<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fonecedores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-bold text-lg mb-4">Você está na parte de fornecedores!</h2>

               
                    @if (session()->has('message'))
                    <div class="mb-4 p-4 text-green-700 bg-green-100 rounded-lg">
                        {{ session('message') }}
                    </div>
                    @endif

                    
                    <div class="mb-8">
                        <a href="{{route('providers.create')}}">
                            <button type="button" class="bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-800 transition duration-200">
                                Novo fornecedor
                            </button>
                        </a>
                    </div>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Nome</th>
                                    <th scope="col" class="px-6 py-3">Email</th>
                                    <th scope="col" class="px-6 py-3">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($providers as $provider)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium text-gray-900">{{ $provider->name }}</td>
                                    <td class="px-6 py-4">{{ $provider->contact_info }}</td>
                                    <td class="px-6 py-4 flex gap-2">
                                        
                                        <a href="{{route('providers.edit', $provider->id)}}">
                                            <button class="bg-yellow-500 text-white h-10 w-24 rounded-lg text-sm shadow-md hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300">
                                                Editar
                                            </button>
                                        </a>

                                       
                                        <form action="{{route('providers.destroy', $provider->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-red-500 text-white h-10 w-24 rounded-lg text-sm shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300" type="submit">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                               
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                        Não há fornecedores para mostrar.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
