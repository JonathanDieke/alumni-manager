<div>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('L\'Annuaire professionnel') }}
            </h2>
        </div>
    </x-slot>

    <div class="border-2 border-gray-200 shadow bg-white w-1/2 mx-auto my-3">
        <div class="flex justify-around my-3 gap-4 px-3" >
            <x-label for="query" :value="__('Rechercher un alumnus :')" class="text-lg font-semibold pt-2" />
            <x-input id="query" type="text" placeholder="Rechercher..." wire:model="query" />
        </div>
    </div>
    <div class="flex container justify-center">
        {{ $alumni->links() }}
    </div>
    @if($alumni->count() > 0)
    <div class="grid grid-cols-3 my-4 w-5/6 mx-auto gap-4">
        @foreach ($alumni as $alumnus)
        <div class="bg-white rounded-md shadow-md pb-2 hover:shadow-lg hover:rounded-b-lg w-5/6">
            <img src="{{ asset('assets/images/login_view.jpg') }}" class="rounded-b-xl h-1/2 w-full">
            <h1 class="text-center text-lg font-bold underline">{{ $alumnus->name . " " . $alumnus->lname }}</h1>
            <div class="my-2 px-4">
                <h3>Poste : Ingénieur développeur</h3>
                <h3>Entreprise : Sociéte Générale</h3>
                <h3>Contact : +225 01 53 XX XX XX</h3>
            </div>
            <div class="flex justify-end px-5 ">
                <a href="#" class="bg-indigo-600 px-3 rounded shadow hover:bg-indigo-500">Détails</a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="flex container justify-center py-3">
        {{ $alumni->links() }}
    </div>
    @else

    @endif
</div>
