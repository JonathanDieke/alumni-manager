<x-guest-layout>
    <div class="md:grid grid-cols-2 gap-4 ">
        <div class="hidden md:flex">
            <img src="{{ asset('assets/images/login_view.jpg') }}" alt="image login view" class="h-screen  ">
        </div>
        <div class="flex flex-col justify-between h-screen ">
            <div>
                <h1 class="text-center uppercase underline font-extrabold text-lg pt-3">
                    #{{ env('APP_NAME') }}
                </h1>
            </div>
            <div class="mx-auto md:w-5/6 px-10 py-5 bg-gray-100 rounded drop-shadow-lg ">
                <h5 class="pb-5 font-semibold uppercase">
                    Se Connecter
                </h5>

                @if ($errors->any())
                    <ul class="mx-8 py-3 bg-red-200 rounded-md border-red-800 overflow-hidden text-center text-red-600 shadow my-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-label for="email" :value="__('E-mail')" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Mot de passe')" />

                        <x-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
                    </div>
                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <p class="text-sm">Vous êtes un alumnus ? <a href="{{ route('login') }}" class="text-blue-400 font-medium"> Cliquez ici </a></p>

                        <x-button class="ml-3">
                            {{ __('Connexion') }}
                        </x-button>
                    </div>
                </form>
            </div>
            <div>
                <x-footer-component/>
            </div>
        </div>
    </div>
</x-guest-layout>
