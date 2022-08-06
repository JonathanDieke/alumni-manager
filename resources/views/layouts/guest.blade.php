<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <style>
            /* montserrat-regular - latin */
            @font-face {
                font-family: 'Montserrat';
                font-style: normal;
                font-weight: 400;
                src: url({{ asset('assets/fonts/montserrat-v25-latin-regular.eot') }}); /* IE9 Compat Modes */
                src: local(''),
                    url({{ asset('assets/fonts/montserrat-v25-latin-regular.eot?#iefix') }}) format('embedded-opentype'), /* IE6-IE8 */
                    url({{ asset('assets/fonts/montserrat-v25-latin-regular.woff2') }}) format('woff2'), /* Super Modern Browsers */
                    url({{ asset('assets/fonts/montserrat-v25-latin-regular.woff') }}) format('woff'), /* Modern Browsers */
                    url({{ asset('assets/fonts/montserrat-v25-latin-regular.ttf') }}) format('truetype'), /* Safari, Android, iOS */
                    url({{ asset('assets/fonts/montserrat-v25-latin-regular.svg#Montserrat') }}x) format('svg'); /* Legacy iOS */
            }
        </style>

        <style>
            body {
                font-family: 'Montserrat';
                /* font-family: 'Nunito', sans-serif; */
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="">
        <div class="font-sanss text-gray-9000 antialiasedd ">
            {{ $slot }}
        </div>
    </body>
</html>
