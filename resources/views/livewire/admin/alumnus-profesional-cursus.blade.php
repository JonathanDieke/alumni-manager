<div class="w-5/6 bg-white rounded-lg shadow-lg">
    @if ($experiences->count() > 0)
    <ul class="divide-y-4 divide-gray-200">
        @foreach ($experiences as $experience)
        <li class="p-3 hover:bg-blue-600 hover:text-blue-500">
            <div class="flex justify-center mb-3">
                <h1 class="text-lg font-bold ">
                    {{-- Systèmes Informatiques et Génie Logiciel --}}
                    {{ $experience->title }}
                </h1>
            </div>
            <div class="flex justify-evenly">
                <div>
                    <span class="text-sm underline">Entreprise</span> <span class="text-sm">:</span> <span class="font-semibold"> {{ $experience->company }}</span>
                </div>
                <div>
                    <span class="text-sm underline">Localisation</span> <span class="text-sm">:</span> <span class="font-semibold"> {{ $experience->localization }}</span>
                </div>
                <div>
                    <span class="text-sm underline">Période</span> <span class="text-sm">:</span> <span class="font-semibold"> {{ explode("-", $experience->start_year)[0] . "/" . explode("-", $experience->end_year)[0] }}</span>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    @else
        <p class="text-center p-5">Aucune expérience ajoutée.</p>
    @endif
</div>
