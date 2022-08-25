<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight uppercase">
            {{ Route::is('alumni.offers') ? 'Toutes les offres' : 'Mes offres' }}
        </h2>
    </x-slot>

    <div class="border-2 border-gray-200 shadow bg-white w-fit mx-auto my-3">
        <h1 class="text-center font-bold uppercase">{{ $count }} offre(s) d'emplois et de stages au total</h1>
        <div class="flex justify-around my-3 gap-4 px-3" >
            @if(!empty($this->alumnus->toArray()))
            <button class="bg-blue-600 rounded-md shadow-lg px-1 text-sm text-white hover:bg-blue-500" wire:click="create">Ajouter une offre</button>
            @endif
            <div>
                <x-input type="text" placeholder="Rechercher..." wire:model="query" />
            </div>
            <div>
                {{-- <x-label value="Nombre par page" /> --}}
                <x-select wire:model="filter">
                    <option value="">Trier par : </option>
                    <option value="job">Emploi</option>
                    <option value="stage">Stage</option>
                </x-select>
            </div>
        </div>
    </div>

    <div class="flex container justify-center">
        {{ $offers->links() }}
    </div>
    @if($count > 0)
        @foreach ($offers as $offer)
        <div class="flex justify-center divide-x-2 my-2">
            <div class="shadow rounded-lg bg-white py-3 px-5 my-5 w-2/3">
                <div class="w-full flex gap-4">
                    <img src="{{ asset('assets/images/offre-d-emploi.png') }}" width="100" height="100" class="flex-none " >
                    <div class=" flex-1 ">
                        <h1 class=" md:text-lg font-bold mb-2 ">{{ $offer->title }}</h1>
                        <p class="pr-3">
                            {{ $offer->description }}
                        </p>
                    </div>
                    <div class="flex-none justify-items-end border rounded shadow bg-{{ $offer->type == 'stage' ? 'red' : 'green' }}-500 text-white h-fit px-1 text-sm">
                        {{ $offer->type == "stage" ? "Stage" : "Emploi" }}
                    </div>
                </div>
                <div class="flex justify-between mt-3 w-full">
                    <div>
                        <span class="text-sm underline">Réf. :</span>
                        <span class=text-sm>{{ $offer->id }} </span>
                    </div>
                    <div>
                        <span class="text-sm underline">Date d'édition :</span>
                        <span class=text-sm>{{ explode(" ", $offer->created_at)[0] }} </span>
                    </div>
                    <div>
                        <span class="text-sm underline">Date limite :</span>
                        <span class=text-sm>{{ explode(" ", $offer->deadline)[0] }} </span>
                    </div>
                    <div>
                        <span class="text-sm underline">Lieu :</span>
                        <span class=text-sm>{{ $offer->localization }} </span>
                    </div>
                </div>
            </div>
            @if(!empty($alumnus->toArray()))
            <div class="flex flex-col justify-center mx-2 px-2 gap-2">
                <a href="#" class="underline text-green-400" wire:click="edit('{{ $offer->id }}')">Editer</a>
                <a href="#" class="underline text-red-400" onclick="if(confirm('Voulez-vous vraiment retirer cette offre ?')) Livewire.emit('delete', '{{ $offer->id }}')">Supprimer</a>
            </div>
            @endif
        </div>
        @endforeach
        <div class="flex container justify-center py-3">
            {{ $offers->links() }}
        </div>
    @else
    <p class="text-center mt-3">Aucune donnée trouvée</p>
    @endif

    @if ($modalIsOpen && !empty($alumnus->toArray()))
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
                        Créer une offre
                    </h1>
                    <div class="bg-white px-4 pt-2 pb-4 sm:p-3 sm:pb-2">
                        <div class="col-span-6 sm:col-span-3">
                            <x-label for="title" :value="__('Titre :')" />
                            <x-input  id="name" class="block mt-1 w-full" type="text" wire:model.defer="offer.title" :value="old('offer.title')" required autofocus placeholder="Ex.: Développeur web fullstack (H/F)"/>
                            @error('offer.title') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <x-label for="type" :value="__('Type de l\'offre :')" />
                                <x-select wire:model.defer="offer.type" class="mt-1">
                                    <option>---</option>
                                    <option value="job">Emploi</option>
                                    <option value="stage">Stage</option>
                                </x-selet>
                                @error('offer.type') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <x-label for="company" :value="__('Entreprise :')" />
                                <x-input  id="company" class="block mt-1 w-full" type="text" wire:model.defer="offer.company" :value="old('offer.company')" required placeholder="Ex.: Société Générale"/>
                                @error('offer.company') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="localization" :value="__('Localisation :')" />
                                    <x-input  id="localization" class="block mt-1 w-full" type="text" wire:model.defer="offer.localization" :value="old('offer.localization')" required placeholder="Ville, commune"/>
                                    @error('offer.localization') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="deadline" :value="__('Date limite :')" />
                                    <x-input  id="deadline" class="block mt-1 w-full" type="date" wire:model.defer="offer.deadline" required placeholder="Ville, commune"/>
                                    @error('offer.deadline') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div>
                            <x-label for="description" :value="__('Description :')" />
                            <textarea id="description" rows="4" class="block w-full text-sm rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"  wire:model.defer="offer.description" required placeholder="Description du profil recherché...">
                            </textarea>
                            @error('offer.description') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="bg-gray-200 px-4 pb-2 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="store" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent
                            px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm
                            hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition
                            ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Enregistrer
                            </button>
                        </span>
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="toggleModal" type="button"
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
</div>
