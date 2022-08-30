<div class="bg-white p-3 border-t-4 border-green-400">
    <div class="image overflow-hidden">
        <img class="h-auto w-full mx-auto"
            src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg"
            alt="">
    </div>
    <h1 class="text-gray-900 text-center font-bold text-xl leading-8 my-1">{{ $alumnus->name . " " . $alumnus->lname }}</h1>

    <ul class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
        <li class="flex items-center py-3">
            <span class="text-xs">Poste : </span>
            <span class="ml-auto">
                <span class="bg-green-500 py-1 px-2 rounded text-white text-sm">{{ $alumnus->job }}</span>
            </span>
        </li>
        <li class="flex items-center py-3">
            <span class="text-xs">Entreprise : </span>
            <span class="ml-auto">
                <span class="bg-green-500 py-1 px-2 rounded text-white text-sm">{{ $alumnus->company }}</span>
            </span>
        </li>
        <li class="flex items-center py-3">
            <span class="text-xs">Promotion : </span>
            <span class="ml-auto">
                <span class="bg-green-500 py-1 px-2 rounded text-white text-sm">{{ $alumnus->getPromotion() }}</span>
            </span>
        </li>

        <li class="flex items-center py-3">
            <span class="text-xs">Membre depuis :</span>
            <span class="ml-auto">{{ $alumnus->created_at }}</span>
        </li>
    </ul>
</div>
