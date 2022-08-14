<figure class="md:flex rounded-xl p-8 md:p-0 dark:bg-slate-800 ">
    <img class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" src="{{ asset('assets/images/login_view.jpg') }}" alt="" width="512" height="780">
    <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
        <div class="grid grid-cols-1 gap-4 text-center">
            <div>
                <span class="text-slate-700">Nom : </span>
                <span class="font-semibold text-sky-400">{{ $alumnus->name }}</span>
            </div>
            <div>
                <span class="text-slate-700">Prénom : </span>
                <span class="font-semibold text-sky-400">{{ $alumnus->lname }}</span>
            </div>
            <div>
                <span class="text-slate-700">Genre : </span>
                <span class="font-semibold text-sky-400">{{ $alumnus->gender == "male" ? "Masculin" : "Féminin" }}</span>
            </div>
            <div>
                <span class="text-slate-700">E-mail : </span>
                <span class="font-semibold text-sky-400">{{ $alumnus->email }}</span>
            </div>
        </div>
    </div>
  </figure>
