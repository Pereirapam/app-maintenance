<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Fornecedor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="text-lg font-semibold mb-6">Novo fornecedor</p>

                    @if ($errors->any())
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-600 p-4 rounded-md mb-6">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div>
                        <form action="{{ route('providers.store') }}" method="POST">
                            @csrf
                            
                            <div class="grid grid-cols-1 gap-4">
                                <!-- Nome -->
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
                                    <input 
                                        type="text" 
                                        name="name" 
                                        id="name" 
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('name') border-red-500 @enderror"
                                    >
                                    @error('name')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Contato -->
                                <div>
                                    <label for="contact_info" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                    <input 
                                        type="email" 
                                        name="contact_info" 
                                        id="contact_info" 
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('contact_info') border-red-500 @enderror"
                                    >
                                    @error('contact_info')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-6">
                                <button 
                                    type="submit" 
                                    class="w-full sm:w-auto bg-blue-700 hover:bg-blue-800 text-white font-medium rounded-lg text-sm px-5 py-2.5 focus:ring-4 focus:ring-blue-300"
                                >
                                    Criar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
