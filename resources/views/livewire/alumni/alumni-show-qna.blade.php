<div>
    <x-slot name="header">
         <h2 class="uppercase">Questions / Réponses</h2>
    </x-slot>

    <div class="mx-auto container mt-3 bg-white px-10 py-3 rounded shadow">
        <div>
            <div class="flex justify-between mt-2">
                <h1 class="text-lg leading-3 mb-1 font-semibold hover:cursor-pointer ">
                    {{ $question->title }}
                </h1>
                <livewire:components.question-modal showEditButton=true :questionEditing="$question" />
            </div>

            {{-- <span class="text-sm mr-3">Crée le {{ $question->created_at->isoFormat("L") }}</span> --}}
            <span class="text-sm">Modifié le {{ $question->created_at->isoFormat("L") }}</span>
            <hr class="my-2">
        </div>

        <div>
            {!! $question->description !!}
        </div>

        <div class="flex justify-between mt-5">
            <div class="badge">
                @foreach ($question->getKeywords() as $keyword)
                <span class="bg-amber-100 text-yellow-700 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">{{ $keyword }}</span>
                @endforeach
            </div>
            <div class="author">
                De
                <span class="text-sm text-blue-500">
                    {{ $question->user->name }},
                </span>
                <span class="text-sm">
                    posé le {{ $question->created_at->isoFormat("LL") }}
                </span>
            </div>
        </div>

        <div class="mt-8 mb-5">
            @if($answers->count() > 5)
            <a href="#text-editor-content" class="text-black bg-emerald-300 rounded-t rounded-b-sm shadow px-3 py-1 hover:bg-emerald-200">Ajouter une réponse</a>
            @endif
            <hr class="my-4 border-2">
            @if($answers->count() > 0)
            <p>{{ $answers->count() }} {{ Str::plural('Réponse', $answers->count()) }}</p>
            @endif
        </div>

        <div id="answer-component" class="my-8">
            @forelse ($answers as $answer)
            <div class="pl-5 md:pr-10">
                <div class="text-">
                    {!! $answer->answer !!}
                </div>
                <div class="flex justify-between text-xs">
                    <div class="flex items-end">
                        @if($this->isOwnerOfAnswer($answer->user->id))
                        <span onclick="if(confirm('Voulez-vous supprimer cette réponse ?')) Livewire.emit('deleteAnswer', '{{ $answer->id }}')" class="text-red-400 hover:cursor-pointer">
                            supprimer
                        </span>
                        @endif
                    </div>
                    <div >
                        <span class="text-blue-400 pr-2">{{ $answer->user->name }}, </span>
                        <div class="text-gray-500"> Répondu {{ $answer->created_at->diffForHumans() }} </div>
                    </div>
                </div>
                {{-- Dernier hr avec .border-2 --}}
                <hr class="my-2 {{ $loop->last ? 'mt-3' : '' }}">
            </div>
            @empty
            <p class="text-center py-5 text-gray-600 font-semibold ">Soyez le premier à apporter une réponse</p>
            @endforelse
        </div>

        @if($question->status == "open")
        <div id="text-editor-content">
            <form action="#" wire:submit.prevent="addAnswer" >
                <x-label value="Votre réponse" class="mb-4 capitalize text-lg font-black" />
                <div wire:ignore>
                    <textarea name="text-editor" id="text-editor-answer" wire:model="answer" data-answer="@this"></textarea>
                </div>
                <button type="submit" wire:click.prevent="addAnswer" class="mt-4 text-black bg-emerald-300 rounded-t rounded-b-sm shadow px-3 py-1 hover:bg-emerald-200 w-48">
                    Envoyer
                </button>
            </form>
        </div>
        @endif

    </div>

    @if($questionModalIsOpen)
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
    @endif

    @push('scripts')

    @endpush
</div>
