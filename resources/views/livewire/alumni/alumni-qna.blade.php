<div class="pb-10">
   <x-slot name="header">
        <h2 class="uppercase">Questions/Réponses</h2>
   </x-slot>
   {{-- Barre de recherche --}}
   <div class="border-2 border-gray-200 shadow bg-white md:w-2/3 lg:w-1/2 w-11/12 mx-auto my-3">
        <div class="sm:flex justify-around my-3 gap-4 px-3" >
            <x-label for="query" :value="__('Rechercher une question :')" class="md:text-lg font-semibold sm:pt-2" />
            <x-input id="query" class="w-full sm:w-1/2" type="text" placeholder="titre, description, mots clés..." wire:model="query" />
        </div>
    </div>
    {{-- Fin de barre de recherche --}}

   
    <div class="container mx-auto">
       <div class="bg-white mt-5 px-5 py-2">
            <div class="flex justify-between mt-3 mb-5">
                <h1 class="underline uppercase font-bold">
                    Liste des questions
                </h1>
                {{-- <button class="bg-sky-400 h-fit rounded-sm shadow-sm rounded-t rounded-b-sm px-3 py-1 hover:bg-sky-300"    >
                    Créer une question
                </button> --}}
                <livewire:components.question-modal  />
            </div>
            <hr class="my-2">
            <div class="mt-3 px-10">
                @forelse ($questions as $question)
                <div class="flex">
                    <div class="flex-none mr-4">
                        <div class="w-fit grid grid-rows-2 gap-3 py-3 justify-items-center items-center px-2 border-red-400 border-">
                            <p class="border-2 border-rose{{ $question->getStatusColor() }}-500 shadow text-rose{{ $question->getStatusColor() }}-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded w-fit">{{ $question->getStatus() }}</p>
                            <p class="bg-green-100 text-green-800 text-xs shadow font-semibold mr-2 px-2.5 py-0.5 rounded w-fit">{{ $question->answers->count() }} réponses </p>
                        </div>
                    </div>
                    <div class="flex-1 pr-3">
                        <h1 class="text-lg leading-3 text-blue-500 mb-2 font-semibold hover:cursor-pointer">
                            <a href="{{ route('alumni.qna.show', $question->id) }}"> {{ $question->title }} </a>
                        </h1>
                        <div class="text-sm text-gray-700">
                            {!! $question->description !!}
                        </div>
                        <div class="flex justify-between mt-2">
                            <div class="badge">
                                @foreach ($question->getKeywords() as $keyword)
                                <span class="bg-amber-100 text-yellow-700 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">{{ $keyword }}</span>
                                @endforeach
                            </div>
                            <div class="author">
                                <span class="text-sm text-blue-500">
                                    <a href="{{ route('alumni.alumnus.details', $question->user->id) }}">
                                        {{ $question->user->fname }}
                                    </a>
                                </span>
                                <span class="text-sm">
                                    , posé {{  $question->updated_at->diffForHumans() }}
                                    {{-- , asked {{ explode(" ", $question->updated_at)[0] }} ago --}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @if(!$loop->last)
                <hr class="my-4">
                @endif
                @empty
                <p class="text-center py-3 text-gray-600 font-semibold ">Aucun résultat</p>
                @endforelse
                <div class="flex container justify-center py-3">
                    {{ $questions->links("vendor.pagination.tailwind") }}
                </div>
            </div>
       </div>
    </div> 

</div>
