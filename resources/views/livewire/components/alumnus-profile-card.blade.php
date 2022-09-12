<div class="bg-white p-3 border-t-4 border-green-400 rounded-b-lg  hover:rounded-t-md">
    <div class="image overflow-hidden">
        <img class="mx-auto rounded-full blur-sm"
            src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg"
            alt="">
    </div>
    <h1 class="text-gray-900 text-center font-bold text-xl leading-8 my-1">
        {{-- {{ $alumnus->fname . " " . $alumnus->lname }} --}}
        <span class="capitalize">
            {{ $alumnus->fname }}
        </span>
        <span class="uppercase">
            {{ $alumnus->lname }}
        </span>
    </h1>

    <ul class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
        <li class="sm:flex md:grid md:grid-rows-2 xl:flex py-2">
            <span class="text-xs flex items-center">Profession : </span>
            <span class="ml-auto md:ml-0 xl:ml-auto">
                <span class="bg-green-500 py-1 px-2 rounded text-white text-xs">{{ $alumnus->job }}</span>
            </span>
        </li>
        <li class="sm:flex md:grid md:grid-rows-2 xl:flex py-2">
            <span class="text-xs flex items-center">Entreprise : </span>
            <span class="ml-auto md:ml-0 xl:ml-auto">
                <span class="bg-green-500 py-1 px-2 rounded text-white text-xs">{{ $alumnus->company }}</span>
            </span>
        </li>
        <li class="sm:flex md:grid md:grid-rows-2 xl:flex py-2">
            <span class="text-xs flex items-center">Promotion : </span>
            <span class="ml-auto md:ml-0 xl:ml-auto">
                <span class="bg-green-500 py-1 px-2 rounded text-white text-sm">{{ $alumnus->getPromotion() }}</span>
            </span>
        </li>
        <li class="sm:flex md:grid md:grid-rows-2 xl:flex py-2">
            <span class="text-xs flex items-center">Membre depuis : </span>
            <span class="ml-auto md:ml-0 xl:ml-auto">
                <span class="bg-green-500 py-1 px-2 rounded text-white text-sm">{{ $alumnus->created_at->isoFormat('LL') }}</span>
            </span>
        </li>
    </ul> 
</div>
