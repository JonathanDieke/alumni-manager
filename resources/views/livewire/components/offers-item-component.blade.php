<div class="flex justify-center divide-x-2 my-2">
    <div class="shadow rounded-lg bg-white py-3 px-5 my-5 w-2/3">
        <div class="w-full grid grid-cols-4 gap-4 grid-flow-col auto-cols-auto">
            <img src="{{ asset('assets/images/offre-d-emploi.png') }}" width="100" height="100" >
            <div class="col-span-3">
                <h1 class="mb-2 font-bold">{{ $offer->title }}</h1>
                <p class="pr-3">
                    {{ $offer->description }}
                </p>
            </div>
            <div class="col-span-2 grid justify-items-end bg-{{ $offer->type == 'stage' ? 'red' : 'green' }}-500 text-white border-2 border-black h-fit px-1 text-sm">
                {{ $offer->type == "stage" ? "Stage" : "Emploi" }}
            </div>
        </div>
        <div class="flex justify-between mt-3 w-full">
            <span class="text-sm underline">Réf.</span><span class=text-sm>: {{ $offer->id }} </span>
            <span class="text-sm underline">Date d'édition</span><span class=text-sm>: {{ explode(" ", $offer->created_at)[0] }} </span>
            <span class="text-sm underline">Date limite</span><span class=text-sm>: {{ explode(" ", $offer->deadline)[0] }} </span>
            <span class="text-sm underline">Lieu</span><span class=text-sm>: {{ $offer->localization }} </span>
        </div>
    </div>
    @if(Route::is("alumni.my-offers"))
    <div class="flex flex-col justify-center mx-2 px-2 gap-2">
        <a class="underline text-green-400">Editer</a>
        <a class="underline text-red-400">Supprimer</a>
    </div>
    @endif
</div> 
