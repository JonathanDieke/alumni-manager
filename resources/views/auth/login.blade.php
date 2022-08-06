<x-guest-layout>
    <div class="grid grid-cols-2 gap-4 ">
        <div class="">
            <img src="{{ asset('assets/images/login_view.jpg') }}" alt="image login view" class="h-screen">
        </div>
        <div class="flex flex-col justify-between h-screen">
            <div class="px-10 py-10 row-end-3 row-span-2">

                <div class="justify-items-center">
                    <div>
                        <h1 class="text">
                            {{ env('APP_NAME') }}
                        </h1>
                    </div>
                    <div class="mt-16 mb-5">
                        <h5>
                            Se Connecter
                        </h5>
                    </div>

                    <div>
                        <form method="POST" action="{{ route('login') }}">
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
                                {{-- @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif --}}

                                <x-button class="ml-3">
                                    {{ __('Connexion') }}
                                </x-button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div>
                <x-footer-component/>
            </div>
        </div>
    </div>
</x-guest-layout>
