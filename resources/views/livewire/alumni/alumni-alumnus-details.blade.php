<div>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profil de ' ) }}
                <span class="underline">
                    {{ $alumnus->fname . " " . $alumnus->lname }}
                </span>
            </h2>
        </div>
    </x-slot>

    <livewire:components.alumnus-details2 :user="$alumnus"/>

    
</div>
