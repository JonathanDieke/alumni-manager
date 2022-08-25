<div>
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700 ">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 rounded-t-lg border-b-2 text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-500
                    border-blue-600 dark:border-blue-500"
                    id="personal-data-tab" data-tabs-target="#personal-data" type="button" role="tab" aria-controls="personal-data" aria-selected="true"
                >
                    Données personnelles
                </button>
            </li>
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300
                    dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                    id="academic-cursus-tab" data-tabs-target="#academic-cursus" type="button" role="tab" aria-controls="academic-cursus" aria-selected="false"
                >
                    Parcours académique
                </button>
            </li>
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300
                    dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                    id="profesional-xp-tab" data-tabs-target="#profesional-xp" type="button" role="tab" aria-controls="profesional-xp" aria-selected="flase"
                >
                    Parcours professionel
                </button>
            </li>
            {{-- <li role="presentation">
                <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300
                    dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                    id="skills-tab" data-tabs-target="#skills" type="button" role="tab" aria-controls="skills" aria-selected="false"
                >
                    Compétences
                </button>
            </li> --}}
        </ul>
    </div>
    <div id="myTabContent" class="mx-auto flex">
        <div class="bg-gray-50 rounded-lg dark:bg-gray-800 " id="personal-data" role="tabpanel" aria-labelledby="personal-data-tab">
            <livewire:components.alumnus-personal-data :alumnus="$alumnus" />
            {{-- @livewire("alumnus-personal-data", ["alumnus" => $alumnus]) --}}
            {{-- <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p> --}}
        </div>
        <div class="p-4  rounded-lg dark:bg-gray-800 w-full flex justify-center " id="academic-cursus" role="tabpanel" aria-labelledby="academic-cursus-tab">
            @livewire("admin.alumnus-academic-cursus", ["formations" => $alumnus->academicFormations])
            {{-- <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p> --}}
        </div>
        <div class="p-4 rounded-lg dark:bg-gray-800 w-full flex justify-center " id="profesional-xp" role="tabpanel" aria-labelledby="profesional-xp-tab">
            @livewire("admin.alumnus-profesional-cursus", ["experiences" => $alumnus->experiences])
            {{-- <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p> --}}
        </div>
        {{-- <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="skills" role="tabpanel" aria-labelledby="skills-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
        </div> --}}
    </div>
</div>
