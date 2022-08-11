<div>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Liste des alumni') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class=" mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
            <div class="p-8" id="content">
                <div class="grid grid-cols-2 mb-5">
                    <button>Ajouter un alumnus</button>
                    <input type="text" wire:model="query"/>
                    {{ $query }}
                </div>
                {{-- <div class="">
                    <table class="table-auto border-collapse border border-slate-400 ">
                        <thead>
                            <tr>
                                <th class="p-3 border border-slate-300">#</th>
                                <th class="p-3 border border-slate-300">Nom</th>
                                <th class="p-3 border border-slate-300">Prénoms</th>
                                <th class="p-3 border border-slate-300">E-mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-3 border border-slate-300">1</td>
                                <td class="p-3 border border-slate-300">DIEKE</td>
                                <td class="p-3 border border-slate-300">Ange Jo</td>
                                <td class="p-3 border border-slate-300">jo.dieke@mail.ci</td>
                            </tr>
                        </tbody>
                    </table>
                </div> --}}


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
                            <tr class="{{ $loop->even ? 'bg-white' : 'bg-gray-50' }} border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50">
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
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Consulter</a>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editer</a>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Supprimer</a>
                                </td>
                            </tr>

                            @endforeach
                            {{-- <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    1
                                </th>
                                <td class="py-4 px-6">
                                    DIEKE
                                </td>
                                <td class="py-4 px-6">
                                    Ange Jonathan
                                </td>
                                <td class="py-4 px-6">
                                    jo.dieke@mail.ci
                                </td>
                                <td class="py-4 px-6">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Consulter</a>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editer</a>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Supprimer</a>
                                </td>
                            </tr>
                            <tr class="bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    1
                                </th>
                                <td class="py-4 px-6">
                                    DIEKE
                                </td>
                                <td class="py-4 px-6">
                                    Ange Jonathan
                                </td>
                                <td class="py-4 px-6">
                                    jo.dieke@mail.ci
                                </td>
                                <td class="py-4 px-6">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Consulter</a>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editer</a>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Supprimer</a>
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    1
                                </th>
                                <td class="py-4 px-6">
                                    DIEKE
                                </td>
                                <td class="py-4 px-6">
                                    Ange Jonathan
                                </td>
                                <td class="py-4 px-6">
                                    jo.dieke@mail.ci
                                </td>
                                <td class="py-4 px-6">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Consulter</a>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editer</a>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Supprimer</a>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
</div>
