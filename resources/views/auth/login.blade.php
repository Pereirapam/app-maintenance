<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex items-center justify-between">
        <!-- Left side with form -->
        <div class="w-full md:w-1/2">
            <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-4" data-parsley-validate>
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="p-2 mt-2 rounded-xl border block w-full" type="email" name="email" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="relative mt-4">
                    <x-input-label for="password" :value="__('Senha')" />
                    <x-text-input id="password" class="p-2 mt-2 rounded-xl border block w-full" type="password" name="password" required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between mt-4 ">
                <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                {{ __('Não tem uma conta?') }}
            </a>
        </div>
                    <x-primary-button class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300  ">
                        {{ __('Entrar') }}
                    </x-primary-button>
                 
                </div>
            </form>

        

           

        <!-- Right side with image
        <div class="hidden md:block w-1/2">
            <img class="rounded-2xl w-full" src="../images/helena-lopes-Pd8tLVGx2O4-unsplash.jpg" alt="Login Image">
        </div> -->
    </div>
</x-guest-layout>
