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
            @import url('http://fonts.cdnfonts.com/css/montserrat');
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
