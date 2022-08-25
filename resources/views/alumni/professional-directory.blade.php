<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('L\'Annuaire professionnel') }}
            </h2>
            <x-input class="border-2 border-gray" value="Rechercher..." type="search"/>
        </div>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div> --}}

    <div class="grid grid-cols-3 my-4 w-5/6 mx-auto gap-4">
        <div class="bg-white rounded-md shadow-md pb-2 hover:shadow-lg hover:rounded-b-lg">
            <img src="{{ asset('assets/images/login_view.jpg') }}" class="rounded-b-xl h-1/2 w-full">
            <h1 class="text-center text-lg font-bold underline">Jonathan DIEKE</h1>
            <div class="mt-2 px-4">
                <h3>Poste : Ingénieur développeur</h3>
                <h3>Entreprise : Sociéte Générale</h3>
                <h3>Contact : +225 01 53 XX XX XX</h3>
            </div>
            <div class="flex justify-end px-5 ">
                <a href="#" class="bg-indigo-600 px-3 rounded shadow hover:bg-indigo-500">Détails</a>
            </div>
        </div>
        {{-- <div class="bg-white">
            <div class="rounded-md shadow">
                <img src="{{ asset('assets/images/login_view.jpg') }}" alt="">
            </div>
        </div>
        <div class="bg-white">
            <div class="rounded-md shadow">
                <img src="{{ asset('assets/images/login_view.jpg') }}" alt="">
            </div>
        </div> --}}
    </div>

</x-app-layout>
