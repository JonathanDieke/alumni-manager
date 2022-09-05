<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>

        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @if(session()->has('message') )
            <div class="mx-8 my-5 py-3 bg-green-200 rounded-md border-green-800 overflow-hidden text-center text-green-600 shadow">
                <p>{{ session("message") }}</p>
            </div>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <footer class="bg-gray-100">
            <x-footer-component/>
        </footer>

        <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
        {{-- <script src="{{ asset('assets/js/ckeditor.js') }}"></script> --}}
        <script type="text/javascript">

            $(() => {
                ClassicEditor.create( $('#text-editor-question'))
                .then( editor => {
                    editor.model.document.on('change:data', () => {
                        let description = $(".text-editor-question").data('description')
                        eval(description).set('question.description', editor.getData())
                    })
                })
                .catch( error => {
                    console.error("ERROR CKEditor de question ==>\n",error );
                });


                ClassicEditor
                .create( document.getElementById('text-editor-answer'), {
                    removePlugins: [ 'Heading'],
                    toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList' ]
                } )
                .then( editor => {
                    window.addEventListener('clearAnswerInput', () => {
                        window.scrollTo({ top: 100, behavior: 'smooth' });
                        editor.data.set("")
                    })
                    editor.model.document.on('change:data', () => {
                        let answer = $("#text-editor-answer").data('answer')
                        eval(answer).set('answer', editor.getData())
                    })
                })
                .catch( error => {
                    console.error("ERROR CKEditor de answer ==>\n",error );
                });
            })
        </script>
        @livewireScripts

        @stack('scripts')
    </body>
</html>
