<div>
    <div class="flex justify-between gap-4">
        @if($showEditButton && $this->isOwnerOfQuestion())
        <button wire:click="toggleQuestionModalEdit" class="bg-amber-400 rounded-sm shadow-sm rounded-t rounded-b-sm px-3 py-1 hover:bg-amber-300"    >
            Editer
        </button>
        @endif
        <button wire:click="toggleQuestionModalCreate" class="bg-sky-400 rounded-sm shadow-sm rounded-t rounded-b-sm px-3 py-1 hover:bg-sky-300"    >
            Créer une question
        </button>
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
                        <div class="col-span-6 sm:col-span-3" wire:ignore>
                            <x-label for="text-editor-question" :value="__('Description :')" />
                            <textarea data-description="@this" id="text-editor-question" wire:model.defer="question.description" required placeholder="Apportez plus de détails à votre question"></textarea>
                            @error('question.description') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="keywords" :value="__('Mots clés :')" />
                                    <x-input  id="keywords" class="block mt-1 w-full" type="text" wire:model.defer="question.keywords" placeholder="Séparer les mots clés par des virgules"/>
                                    @error('question.keywords') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="status" :value="__('Statut :')" />
                                    <x-select wire:model.defer="question.status" class="mt-1">
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
                            <button wire:click.prevent="storeQuestion" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent
                            px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm
                            hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition
                            ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Enregistrer
                            </button>
                        </span>
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="reinitializeInputs" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent
                            px-4 py-2 bg-amber-400 text-base leading-6 font-medium text-white shadow-sm
                            hover:bg-amber-300 focus:outline-none focus:border-amber-500 focus:shadow-outline-amber transition
                            ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Réinitialiser
                            </button>
                        </span>
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="toggleQuestionModalCreate" type="button"
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
    <script>
        ClassicEditor.create( $('#text-editor-q'), {
            removePlugins: [ 'Heading'],
            toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList' ]
        } )
        .then( editor => {
            editor.model.document.on('change:data', () => {
                let description = $("#text-editor-q").data('description')
                eval(description).set('question.description', editor.getData())
            })
        } )
        .catch( error => {
            console.error("ERROR CKEditor de question ==>\n",error.message );
        });
    </script>
    @endpush

</div>
