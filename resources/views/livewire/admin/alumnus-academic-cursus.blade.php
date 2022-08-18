<div class="w-5/6 bg-white rounded-lg shadow-lg">
    @if ($formations->count() > 0)
    <ul class="divide-y-4 divide-gray-200">
        @foreach ($formations as $formation)
        <li class="p-3 hover:bg-blue-600 hover:text-blue-500">
            <div class="flex justify-center mb-3">
                <h1 class="text-lg font-bold ">
                    {{-- Systèmes Informatiques et Génie Logiciel --}}
                    {{ $formation->name }}
                </h1>
            </div>
            <div class="flex justify-evenly">
                <div>
                    <span class="text-sm underline">Ecole</span> <span class="text-sm">:</span> <span class="font-semibold"> {{ $formation->school }}</span>
                </div>
                <div>
                    <span class="text-sm underline">Niveau</span> <span class="text-sm">:</span> <span class="font-semibold"> {{ $formation->level }}</span>
                </div>
                <div>
                    <span class="text-sm underline">Période</span> <span class="text-sm">:</span> <span class="font-semibold"> {{ explode("-", $formation->start_year)[0] . "/" . explode("-", $formation->end_year)[0] }}</span>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    @else
        <p class="text-center p-5">Aucune formation ajoutée.</p>
    @endif
</div>
