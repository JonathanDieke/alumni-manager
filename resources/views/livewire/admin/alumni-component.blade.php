<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des alumni') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-8" id="content">
                    <div class="flex flex-col-reverse sm:flex sm:flex-row sm:justify-between sm:mb-5">
                        <x-button wire:click="create" class="block mb-2 text-center sm:mb-0 w-full sm:w-fit h-fit sm:h-auto">Ajouter un alumnus</x-button>
                        <x-input wire:model="query" type="text" class=" w-full sm:w-48 block mb-2 sm:mb-0" placeholder="Rechercher un alumnus..."/>
                    </div>

                    @if ($alumni->count() > 0)
                    <div class="overflow-x-auto relative drop-shadow-md sm:rounded-lg w-full">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-md text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        #
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Nom
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Prénoms
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        E-mail
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alumni as $alumnus)
                                <tr class=" odd:bg-white even:bg-gray-100 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="py-4 px-6 upper">
                                        {{ $alumnus->lname }}
                                    </td>
                                    <td class="py-4 px-6 capitalize">
                                        {{ $alumnus->fname }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $alumnus->email }}
                                    </td>
                                    <td class="py-4 px-6 flex justify-start gap-3 md:gap-4">
                                        <a href="{{ route('admin.alumnus.details', $alumnus->id) }}" class="inline hover:text-blue-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 inline">
                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                        <a href="#" class="inline hover:text-amber-500" wire:click="edit('{{ $alumnus->id }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 inline">
                                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                            </svg>
                                        </a>
                                        <a href="#" class="inline hover:text-red-500" onclick="if(confirm('Voulez-vous vraiment retirer cet alumnus ?')) Livewire.emit('delete', '{{ $alumnus->id }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 inline">
                                                <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                        <div class=" my-3 flex justify-center">
                            {{ $alumni->links() }}
                        </div>
                    </div>

                    @else
                    <div class="text-center text-bold mt-10">
                        <div class="px-10">
                            <hr class="border-2 my-3 mx-auto px-10">
                        </div>
                        Pas de données disponibles.
                    </div>
                    @endif



                </div>
            </div>
        </div>
    </div>

    @if($modalIsOpen)
    <div class="fixed z-10 inset-0 ease-out duration-400 overflow-auto ">
        <div class="justify-center c pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <!-- Cet élément consiste à inciter le navigateur à centrer le contenu modal. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
            <div class="inline-block align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle max-w-screen-md sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                {{-- <div class="bg-gray-200 px-4 py-2 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span>close</span>
                </div> --}}
                <form>
                    <h1 class="text-center text-lg font-bold uppercase bg-gray-400 p-4">
                        Créer un alumnus
                    </h1>
                    <div class="bg-white px-4 pt-2 pb-4 sm:p-3 sm:pb-2">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <x-label for="lname" :value="__('Nom :')" />
                                <x-input  id="lname" class="block mt-1 w-full" type="text" name="lname" :value="old('lname')" required autofocus wire:model.defer="alumnus.lname"/>
                                @error('alumnus.lname') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <x-label for="fname" :value="__('Prénoms :')" />
                                <x-input  id="fname" class="block mt-1 w-full" type="text" name="fname" :value="old('fname')" required wire:model.defer="alumnus.fname"/>
                                @error('alumnus.fname') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="email" :value="__('Email :')" />
                                    <x-input  id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required wire:model.defer="alumnus.email"/>
                                    @error('alumnus.email') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="gender" :value="__('Genre :')" />
                                    <x-select wire:model.defer="alumnus.gender">
                                        <option selected >---</option>
                                        <option value="female">Féminin</option>
                                        <option value="male">Masculin</option>
                                    </x-selet>
                                    @error('alumnus.gender') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="birthdate" :value="__('Date d\'anniversaire :')" />
                                    <x-input  id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" required wire:model.defer="alumnus.birthdate"/>
                                    @error('alumnus.birthdate') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="job" :value="__('Poste :')" />
                                    <x-input  id="job" class="block mt-1 w-full" type="text" name="job" required wire:model.defer="alumnus.job"/>
                                    @error('alumnus.job') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="company" :value="__('Entreprise :')" />
                                    <x-input  id="company" class="block mt-1 w-full" type="text" name="company" required wire:model.defer="alumnus.company"/>
                                    @error('alumnus.company') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="tel" :value="__('Téléphone :')" />
                                    <x-input  id="tel" class="block mt-1 w-full" type="text" name="tel" required wire:model.defer="alumnus.tel"/>
                                    @error('alumnus.tel') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="w-full my-1">
                                <x-label for="promotion" :value="__('Promotion :')" />
                                <x-select wire:model.defer="alumnus.promotion">
                                    <option selected >---</option>
                                    <option value="it1">IT 1</option>
                                    <option value="it2">IT 2</option>
                                    <option value="it3">IT 3</option>
                                    <option value="it4">IT 4</option>
                                    <option value="it5">IT 5</option>
                                    <option value="it6">IT 6</option>
                                    <option value="it7">IT 7</option>
                                    <option value="it8">IT 8</option>
                                    <option value="it9">IT 9</option>
                                    <option value="it10">IT 10</option>
                                </x-selet>
                                @error('alumnus.promotion') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="password" :value="__('Mot de passe :')" />
                                    <x-input  id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password')" required wire:model.defer="alumnus.password"/>
                                    @error('alumnus.password') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="password_confirmation" :value="__('Confirmer le mot de passe :')" />
                                    <x-input  id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" :value="old('password_confirmation')" required wire:model.defer="alumnus.password_confirmation"/>
                                    {{-- @error('alumnus.password') <span class="text-red-500">{{ $message }}</span>@enderror --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-200 px-4 py-2 sm:px-6 sm:flex sm:flex-row-reverse">
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
                            <button wire:click.prevent="resetInputs" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent
                            px-4 py-2 bg-amber-400 text-base leading-6 font-medium text-white shadow-sm
                            hover:bg-amber-300 focus:outline-none focus:border-amber-500 focus:shadow-outline-amber transition
                            ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Réinitialiser
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
