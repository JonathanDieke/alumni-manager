<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ Route::is('alumni.offers') ? 'Toutes les offres' : 'Mes offres' }}
        </h2>
    </x-slot>

    <div class="border-2 border-gray-200 shadow bg-white w-fit mx-auto my-3">
        <h1 class="text-center font-bold uppercase">{{ $count }} offres d'emplois et de stages</h1>
        <div class="flex justify-around my-3 gap-4 px-3">
            @if(Route::is("alumni.my-offers"))
            <button class="bg-blue-600 rounded-md shadow-lg px-1 text-sm hover:bg-blue-500">Ajouter une offre</button>
            @endif
            <div>
                <x-input type="text" placeholder="Rechcercher..." wire:model="query" />
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

    <div class="bg-whitee flex container justify-center">
        {{ $offers->links() }}
    </div>
    @if($count > 0)
        @foreach ($offers as $offer)
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
        @endforeach
        <div class="bg-whitee flex container justify-center py-3">
            {{ $offers->links() }}
        </div>
    @else
    <p>Aucune donnée trouvée</p>
    @endif

    @if ($modalIsOpen && Route::is("alumni.my-offers"))
    <div class="fixed z-10 inset-0 ease-out duration-400 ">
        <div class="justify-center c pt-4 px-4 pb-20 text-center sm:block sm:p-0">
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
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <x-label for="name" :value="__('Nom :')" />
                                <x-input  id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus/>
                                @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <x-label for="lname" :value="__('Prénoms :')" />
                                <x-input  id="lname" class="block mt-1 w-full" type="text" name="lname" :value="old('lname')" required/>
                                @error('lname') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="email" :value="__('Email :')" />
                                    <x-input  id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required/>
                                    @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="gender" :value="__('Genre :')" />
                                    <x-select>
                                        <option>Féminin</option>
                                        <option>Masculin</option>
                                    </x-selet>
                                    @error('gender') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="password" :value="__('Mot de passe :')" />
                                    <x-input  id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password')" required/>
                                    @error('password') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="password_confirmation" :value="__('Confirmer le mot de passe :')" />
                                    <x-input  id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" :value="old('password_confirmation')" required/>
                                    @error('password') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="bg-gray-200 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="store()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent
                            px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm
                            hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition
                            ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Enregistrer
                            </button>
                        </span>
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                            <button wire:click.prevent="toggleModal()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4
                            py-2 bg-red-400 text-base leading-6 font-medium text-white shadow-sm
                            hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue
                            transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Supprimer
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

</div>
