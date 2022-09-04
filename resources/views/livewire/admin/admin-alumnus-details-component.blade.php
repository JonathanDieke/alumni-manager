<div> 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informations détaillées de ') }}
            <span class="underline">
                <span class="capitalize">{{ $alumnus->fname }}</span>
                <span class="uppercase">{{ $alumnus->lname }}</span>
            </span>
        </h2>
    </x-slot>

    <livewire:components.alumnus-details2 :user="$alumnus"/> 
</div> 
