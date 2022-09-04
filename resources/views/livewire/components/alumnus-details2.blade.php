<div >
    <div class="container mx-auto p-5 h-fit ">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:ml-2 md:mr-5">
                <!-- Profile Card -->
                <livewire:components.alumnus-profile-card :alumnus="$alumnus" />
                <!-- End of profile card -->
                <div class="my-4"></div>
            </div>
            <!-- End of Left Side -->

            <!-- Right Side -->
            <div class="w-full md:w-9/12  h-full">
                <!-- Profile tab -->

                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">A propos</span>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold capitalize">Prénoms : </div>
                                <div class="px-4 py-2">{{ $alumnus->fname }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Nom : </div>
                                <div class="px-4 py-2">{{ $alumnus->lname }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Genre : </div>
                                <div class="px-4 py-2">{{ $alumnus->gender }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Tel. : </div>
                                <div class="px-4 py-2">{{ $alumnus->tel }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">E-mail : </div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800" href="mailto:{{ $alumnus->email }}">{{ $alumnus->email }}</a>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Date de naissance : </div>
                                <div class="px-4 py-2">{{ $alumnus->birthdate }}</div>
                            </div>
                        </div>
                    </div>
                    @if($this->isAuthUser())
                    <button wire:click="toggleProfileModal" class="block w-full text-blue-800 text-sm font-semibold rounded-lg bg-gray-300 hover:bg-gray-200 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                        Editer
                    </button>
                    @endif
                </div>
                <!-- End of about section -->

                <div class="my-4"></div>

                <!-- Experience and education -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="grid grid-cols-2 gap-6">
                        <!-- Experience -->
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Experiences ({{ $experiences->count() }})</span>
                            </div>
                            @if($this->isAuthUser())
                            <div class="mb-3">
                                <button wire:click="toggleXPModal" class="block text-blue-800 text-sm font-semibold rounded bg-gray-300 hover:bg-gray-200 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                                    Ajouter une expérience
                                </button>
                            </div>
                            @endif
                            @if($experiences->count() > 0)
                            <ul class="list-inside space-y-2">
                                @foreach ($experiences as $xp)
                                <li class="flex flex-row">

                                    @if($this->isAuthUser())
                                    <div class="basis-1/2 hover:cursor-pointer" wire:click="editXP({{ $xp }})">
                                        <div class="text-teal-600">{{$xp->title }}</div>
                                        <div class="text-gray-500 text-xs">Chez <span class="uppercase"> {{ $xp->company }}</span></div>
                                        <div class="text-gray-500 text-xs">{{ $xp->start_date }}</div>
                                    </div>
                                    <div class="basis-1/2 flex justify-center">
                                        <button class="text-sm font-medium text-red-600 bg-red-400 h-fit px-2 rounded shadow hover:bg-red-300" onclick="if(confirm('Voulez-vous supprimer cette expérience ?')) Livewire.emit('deleteXP', '{{ $xp->id }}')">Supprimer</button>
                                    </div>
                                    @else
                                    <div class="basis-1 hover:cursor-pointer">
                                        <div class="text-teal-600">{{$xp->title }}</div>
                                        <div class="text-gray-500 text-xs">Chez <span class="uppercase"> {{ $xp->company }}</span></div>
                                        <div class="text-gray-500 text-xs">{{ $xp->start_date }}</div>
                                    </div>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        <!-- End Experience -->

                        <!-- Education -->
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                        <path fill="#fff"
                                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Formations ({{ $formations->count() }})</span>
                            </div>
                            @if($this->isAuthUser())
                            <div class="mb-3">
                                <button wire:click="toggleFormationModal" class="block text-blue-800 text-sm font-semibold rounded bg-gray-300 hover:bg-gray-200 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                                    Ajouter une formation
                                </button>
                            </div>
                            @endif

                            @if($formations->count() > 0)
                            <ul class="list-inside space-y-2">
                                @foreach ($formations as $formation)
                                <li class="flex flex-row">
                                    @if($this->isAuthUser())
                                    <div class="basis-1/2 hover:cursor-pointer" wire:click="editFormation({{ $formation }})">
                                        <div class="text-teal-600">{{ $formation->name }} ({{ $formation->getLevel() }})</div>
                                        <div class="text-gray-500 text-xs">{{ $formation->school }} ({{ $formation->start_year }})</div>
                                    </div>
                                    <div class="basis-1/2 flex justify-end">
                                        <button class="text-sm font-medium text-red-600 bg-red-400 h-fit px-2 rounded shadow hover:bg-red-300" onclick="if(confirm('Voulez-vous supprimer cette formation ?')) Livewire.emit('deleteFormation', '{{ $formation->id }}')">Supprimer</button>
                                    </div>
                                    @else
                                    <div class="basis-1 hover:cursor-pointer">
                                        <div class="text-teal-600">{{ $formation->name }} ({{ $formation->getLevel() }})</div>
                                        <div class="text-gray-500 text-xs">{{ $formation->school }} ({{ $formation->start_year }})</div>
                                    </div>
                                    @endif
                                </li>

                                @endforeach
                            </ul>
                            @endif
                        </div>
                        <!-- End education -->
                    </div>
                    <!-- End of Experience and education grid -->
                </div>
                <!-- End of profile tab -->
            </div>
        </div>
    </div>

    @if ($profileModalIsOpen && $this->isAuthUser())
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
                    Editer mon profil {{ $alumnus->name }}
                </h1>
                <div class="bg-white px-4 pt-2 pb-4 sm:p-3 sm:pb-2">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <x-label for="name" :value="__('Nom :')" />
                            <x-input  id="name" class="block mt-1 w-full" type="text" name="name" required autofocus wire:model.defer="alumnus.name"/>
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
                        <div class="w-full">
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
                    </div>
                </div>
                <div class="bg-gray-200 px-4 pb-2 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="updateProfile" type="button"
                        class="inline-flex justify-center w-full rounded-md border border-transparent
                        px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm
                        hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition
                        ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Enregistrer
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="toggleProfileModal" type="button"
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


    @if ($XPModalIsOpen && $this->isAuthUser())
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
                        Ajouter une expérience professionelle
                    </h1>
                    <div class="bg-white px-4 pt-2 pb-4 sm:p-3 sm:pb-2">
                        <div class="col-span-6 sm:col-span-3">
                            <x-label for="title" :value="__('Titre :')" />
                            <x-input  id="title" class="block mt-1 w-full" type="text" wire:model.defer="experience.title" :value="old('experience.title')" required autofocus placeholder="Ex.: Développeur web fullstack (H/F)"/>
                            @error('experience.title') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <x-label for="company" :value="__('Entreprise :')" />
                                <x-input  id="company" class="block mt-1 w-full" type="text" wire:model.defer="experience.company" :value="old('experience.company')" required placeholder="Ex.: Société Générale"/>
                                @error('experience.company') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <x-label for="localization" :value="__('Localisation :')" />
                                <x-input  id="localization" class="block mt-1 w-full" type="text" wire:model.defer="experience.localization" :value="old('experience.localization')" required placeholder="Ville, commune"/>
                                @error('experience.localization') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="start_date" :value="__('Date de début :')" />
                                    <x-input  id="start_date" class="block mt-1 w-full" type="date" wire:model.defer="experience.start_date" required/>
                                    @error('experience.start_date') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="end_date" :value="__('Date de fin :')" />
                                    <x-input  id="end_date" class="block mt-1 w-full" type="date" wire:model.defer="experience.end_date" required/>
                                    @error('experience.end_date') <span class="text-red-500">{{ $message }}</span>@enderror
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


    @if ($formationModalIsOpen && $this->isAuthUser())
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
                        Ajouter une formation académique
                    </h1>
                    <div class="bg-white px-4 pt-2 pb-4 sm:p-3 sm:pb-2">
                        <div class="col-span-6 sm:col-span-3">
                            <x-label for="name" :value="__('Nom de la formation :')" />
                            <x-input  id="name" class="block mt-1 w-full" type="text" wire:model.defer="formation.name" required autofocus placeholder="Ex.: Big Data Intelligence for Human Augmented Reality"/>
                            @error('formation.name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <x-label for="school" :value="__('Ecole :')" />
                                <x-input  id="school" class="block mt-1 w-full" type="text" wire:model.defer="formation.school" required placeholder="Ex.: ESTIA"/>
                                @error('formation.school') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <x-label for="localization" :value="__('Niveau :')" />
                                <x-select id="level" wire:model.defer="formation.level">
                                    <option selected >---</option>
                                    <option value="bac">Baccalauréat</option>
                                    <option value="bac1">Bac +1</option>
                                    <option value="bac2">Bac +2</option>
                                    <option value="bac3">Bac +3</option>
                                    <option value="bac4">Bac +4</option>
                                    <option value="bac5">Bac +5</option>
                                    <option value="bac6">Bac +6</option>
                                    <option value="bac7">Bac +7</option>
                                    <option value="bac8">Bac +8</option>
                                </x-selet>
                                @error('formation.level') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="start_year" :value="__('Date de début :')" />
                                    <x-input  id="start_year" class="block mt-1 w-full" type="date" wire:model.defer="formation.start_year" required/>
                                    @error('formation.start_year') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-label for="end_year" :value="__('Date de fin :')" />
                                    <x-input  id="end_year" class="block mt-1 w-full" type="date" wire:model.defer="formation.end_year" required/>
                                    @error('formation.end_year') <span class="text-red-500">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-200 px-4 pb-2 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="storeFormation" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent
                            px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm
                            hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition
                            ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Enregistrer
                            </button>
                        </span>
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="reinitializeFormation" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent
                            px-4 py-2 bg-amber-400 text-base leading-6 font-medium text-white shadow-sm
                            hover:bg-amber-300 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition
                            ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Réinitialiser
                            </button>
                        </span>
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="toggleFormationModal" type="button"
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
