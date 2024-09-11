<x-guest-layout>
    <div class="h-screen md:flex">
        <div class="order-2 relative overflow-hidden md:flex w-1/2 bg-gradient-to-tr from-blue-800 to-purple-700  justify-around items-center hidden">
            <div class="p-12">
                <h1 class="text-white font-bold text-4xl font-sans">République Démocratique du Congo</h1>
                <p class="text-white mt-4">Le Ministère de la santé publique </p>
            </div>
            <div class="absolute -bottom-32 -left-40 w-80 h-80 border-4 rounded-full border-opacity-100 border-t-8 border-red-500 "></div>
            <div class="absolute -bottom-40 -left-20 w-80 h-80 border-4 rounded-full border-opacity-100 border-t-8 border-yellow-200"></div>
            <div class="absolute -top-40 -right-0 w-80 h-80 border-4 rounded-full border-opacity-100 border-t-8 border-yellow-200"></div>
            <div class="absolute -top-20 -right-20 w-80 h-80 border-4 rounded-full border-opacity-100 border-t-8 border-blue-500"></div>
        </div>
        <div class="bg-gray-100 dark:bg-gray-700 md:flex-1">
            <x-authentication-card>
                <x-slot name="logo">
                    <x-authentication-card-logo />
                </x-slot>

                <x-validation-errors class="mb-4" />

                @if (session('error'))
                <div class="mb-4 font-medium text-sm text-red-600">
                    {{ session('error') }}
                </div>
                @endif

                <form wire:submit.prevent="submit" name="form">
                    <div>
                        <x-label for="matricule" value="{{ __('matricule') }}" />
                        <x-input id="matricule" class="block mt-1 w-full" type="text" wire:model="matricule" name="matricule" :value="old('matricule')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Mot de passe') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" wire:model="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="block mt-4 mb-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-300">{{ __('Se souvenir de moi') }}</span>
                        </label>
                    </div>

                    <x-button class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white dark:text-black dark:hover:text-blue-900 bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-950 hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 font-bold">
                        {{ __('Se connecter') }}
                    </x-button>

                </form>
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-300 dark:hover:text-red-200 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié?') }}
                    </a>
                    @endif
                </div><e
            </x-authentication-card>
      

        </div>

    </div>

</x-guest-layout>