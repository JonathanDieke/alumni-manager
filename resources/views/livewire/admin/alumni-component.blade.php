<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des alumni') }}
        </h2>
    </x-slot>

    <div class="py-5">
        @if(session()->has('message'))
        <div class="mx-8 mb-5 py-3  bg-green-100 rounded-md border-green-800 overflow-hidden text-center text-green-500">
            <p>{{ session("message") }}</p>
        </div>
        @endif
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-8" id="content">
                    <div class="grid grid-cols-2 mb-5">
                        <button wire:click="create">Ajouter un alumnus</button>
                        <input wire:model="query" type="text">
                    </div>

                    @if ($alumni->count() > 0)
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
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
                                <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }} border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="py-4 px-6">
                                        {{ $alumnus->name }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $alumnus->lname }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $alumnus->email }}
                                    </td>
                                    <td class="py-4 px-6">
                                        <a href="{{ route('admin.alumnus.details', $alumnus->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Consulter</a>
                                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" wire:click="edit('{{ $alumnus->id }}')">Editer</a>
                                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="if(confirm('Voulez-vous vraiment retirer cet alumnus ?')) Livewire.emit('delete', {{ $alumnus->id }})">Supprimer</a>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                        <div class="">
                            {{ $alumni->links() }}
                        </div>
                    </div>

                    @else
                    <div class="text-center text-bold mt-10">
                        Pas de données disponibles.
                    </div>
                    @endif



                </div>
            </div>
        </div>
    </div>

    @if($modalIsOpen)
    <div class="fixed z-10 inset-0 ease-out duration-400 ">
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
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <x-label for="name" :value="__('Nom :')" />
                                <x-input  id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus wire:model.defer="alumnus.name"/>
                                @error('alumnus.name') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <x-label for="lname" :value="__('Prénoms :')" />
                                <x-input  id="lname" class="block mt-1 w-full" type="text" name="lname" :value="old('lname')" required wire:model.defer="alumnus.lname"/>
                                @error('alumnus.lname') <span class="text-red-500">{{ $message }}</span>@enderror
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
                    <div class="bg-gray-200 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
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
                        {{-- <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button onclick="if(confirm('Voulez-vous vraiment retirer cet alumnus ?')) Livewire.emit('deleteFromModal')" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent
                            px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm
                            hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition
                            ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Supprimer
                            </button>
                        </span> --}}
                        {{-- <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                            <button wire:click.prevent="toggleModal" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4
                            py-2 bg-red-400 text-base leading-6 font-medium text-white shadow-sm
                            hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue
                            transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Supprimer
                            </button>
                        </span> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>
