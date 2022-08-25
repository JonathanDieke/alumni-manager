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

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


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

                            <!-- Is Admin -->
                            {{-- <label for="is_admin" class="inline-flex relative items-center mb-5 cursor-pointer">
                                <input type="checkbox" value="off" id="is_admin" class="sr-only peer" name="is_admin">
                                <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Small toggle</span>
                            </label> --}}
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
