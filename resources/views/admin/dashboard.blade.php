<x-admin-layout>
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
                        <input type="search" name="" id=""/>
                    </div>
                    <div class="">
                        <table class="table table-light">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>PRénoms</th>
                                    <th>E-mail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>DIEKE</td>
                                    <td>Ange Jo</td>
                                    <td>jo.dieke@mail.ci</td>
                                </tr>
                            </tbody> 
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
