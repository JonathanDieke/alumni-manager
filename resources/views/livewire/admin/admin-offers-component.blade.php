<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Toutes les offres') }}
        </h2>
    </x-slot>

    <div class="border-2 border-gray-200 shadow bg-white w-1/2 mx-auto my-3">
        <h1 class="text-center">70 offres d'emplois et de stages</h1>
        <div class="flex justify-around my-3">
            <div>
                <x-input type="text" placeholder="Rechcercher..." />
            </div>
            <div>
                {{-- <x-label value="Nombre par page" /> --}}
                <x-select >
                    <option value="">Trier par : </option>
                    <option value="">opt2</option>
                </x-select>
            </div>
        </div>
    </div>
 
    <div class="flex justify-center divide-x">
        <div class="shadow rounded-lg bg-white py-3 px-5 my-5 w-3/4">
            <div class="w-full grid grid-cols-4 gap-4 grid-flow-col auto-cols-auto">
                <img src="{{ asset('assets/images/login_view.jpg') }}">
                <div class="col-span-3">
                    <h1 class="mb-2">Dév web/mobile junior (H/F)</h1>
                    <p class="pr-3">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias minima rem obcaecati asperiores explicabo reiciendis laudantium ullam? Blanditiis itaque molestias impedit quis facilis, excepturi nam recusandae nisi? Quas, laudantium cupiditate.
                    </p>
                </div>
                <div class="col-span-2 grid justify-items-end bg-red-500 text-white border-2 border-black h-fit px-1 text-sm">
                    Emploi
                </div>
            </div>
            <div class="flex justify-between mt-3 w-full">
                <p class="text-sm ">Réf. : abc</p>
                <p class="text-sm ">Date d'édition : 17/08/2022</p>
                <p class="text-sm ">Date limite : 01/10/2022</p>
                <p class="text-sm ">Lieu : Marcory Abidjan</p>
                <div class="">
                </div>
            </div>
        </div>
    
        <div class="flex flex-col justify-center mx-2 px-2">
            <p>Editer</p>
            <p>Supprimer</p>
        </div> 
    </div>
</div>
