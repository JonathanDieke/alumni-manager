<div>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
                {{ __('L\'Annuaire professionnel') }}
            </h2>
        </div>
    </x-slot>
    <div class="md:container md:mx-auto">
        <div class="border-2 border-gray-200 shadow bg-white md:w-2/3 lg:w-1/2 w-11/12 mx-auto my-3">
            <div class="flex justify-around my-3 gap-4 px-3" >
                <x-label for="query" :value="__('Rechercher un alumnus :')" class="text-lg font-semibold pt-2" />
                <x-input id="query" type="text" placeholder="nom, prénoms, email..." wire:model="query" />
            </div>
        </div>
        <div class="flex container justify-center">
            {{ $alumni->links("vendor.pagination.tailwind") }}
        </div>
    </div>
    @if($alumni->count() > 0)
    <div class="md:container mx-auto">
        <div class="grid grid-cols-2 md:grid-cols-3 my-4 md:w-auto gap-4">
            @foreach ($alumni as $alumnus)
            @php
            if(!empty($query))
                // dd($alumni)
            @endphp
            <div class="w-full lg:w-10/12 hover:drop-shadow-lg">
                <a href="{{ route('alumni.alumnus.details', $alumnus) }}">
                    <livewire:components.alumnus-profile-card :alumnus="$alumnus" />
                </a>
            </div> 
            @endforeach
        </div>
    </div>
    <div class="flex container justify-center py-3">
        {{ $alumni->links("vendor.pagination.tailwind") }}
    </div>
    @else
    <div class="text-center text-bold mt-10">
        {{-- <div class="px-10">
            <hr class="border-2 my-3 mx-auto px-10">
        </div> --}}
        Pas de données disponibles.
    </div>
    @endif
</div>
