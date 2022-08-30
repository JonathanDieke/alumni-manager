<div>
   <x-slot name="header">
        <h2>Questions/Réponses</h2>
   </x-slot>
   {{-- Barre de recherche --}}
   <div class="border-2 border-gray-200 shadow bg-white w-1/2 mx-auto my-3">
    <div class="flex justify-around my-3 gap-4 px-3" >
            <x-label for="query" :value="__('Rechercher une question :')" class="text-lg font-semibold pt-2" />
            <x-input id="query" type="text" placeholder="Rechercher..." wire:model="query" />
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
                            <p class="border-2 border-{{ $question->getStatusColor() }}-500 shadow text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded w-fit">{{ $question->getStatus() }}</p>
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
                                        {{ $question->user->name }}
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
                <hr class="my-4">
                @empty
                <p class="text-center py-3 text-gray-600 font-semibold ">Aucun résultat</p>
                @endforelse
            </div>

       </div>
   </div>

   {{-- @if($questionModalIsOpen)
    <div class="fixed z-10 inset-0 ease-out duration-400 ">
        <div class="justify-center pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <!-- Cet élément consiste à inciter le navigateur à centrer le contenu modal. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
            <div class="inline-block align-middle bg-white rounded-lg
            text-left overflow-hidden shadow-xl transform transition-all
            sm:my-8 sm:align-middle max-w-screen-md sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <form>
                    <h1 class="text-center text-lg font-bold uppercase bg-gray-400 p-4">
                        Ajouter/Editer une question
                    </h1>
                    <div class="bg-white px-4 pt-2 pb-4 sm:p-3 sm:pb-2">
                        <div class="col-span-6 sm:col-span-3">
                            <x-label for="title" :value="__('Titre :')" />
                            <x-input  id="title" class="block mt-1 w-full" type="text" wire:model.defer="question.title" required autofocus placeholder="Ex.: Quelles fonctionnalités ajouter à une plateforme de gestion des alumni ?"/>
                            @error('question.title') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <x-label for="description" :value="__('Description :')" />
                            <textarea  id="description" class="text-editor" wire:model.defer="question.description" required placeholder="Apportez plus de détails à votre question"></textarea>
                            @error('question.description') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="keywords" :value="__('Mots clés :')" />
                                    <x-input  id="keywords" class="block mt-1 w-full" type="text" wire:model.defer="question.keywords" required placeholder="Séparer les mots clés par des virgules"/>
                                    @error('question.keywords') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="status" :value="__('Statut :')" />
                                    <x-select wire:model.defer="question.status">
                                        <option selected >---</option>
                                        <option value="open">Ouvert</option>
                                        <option value="resolved">Résolu</option>
                                        <option value="closed">Fermé</option>
                                    </x-selet>
                                    @error('question.status') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-200 px-4 pb-2 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="storeXP" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent
                            px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm
                            hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition
                            ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Enregistrer
                            </button>
                        </span>
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="reinitializeXP" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent
                            px-4 py-2 bg-amber-400 text-base leading-6 font-medium text-white shadow-sm
                            hover:bg-amber-300 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition
                            ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Réinitialiser
                            </button>
                        </span>
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="toggleXPModal" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent
                            px-4 py-2 bg-gray-500 text-base leading-6 font-medium text-white shadow-sm
                            hover:bg-gray-500 focus:outline-none focus:border-gray-600 focus:shadow-outline-gray transition
                            ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Annuler
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif --}}
</div>
