<div class="w-full max-w-xl">
    <div class="flex items-center gap-4">
        <img class="hidden md:inline-block w-32" src="https://chromecinema.hu/assets/mozi/img/mobile-default-dark.png" alt="">
        <div class="pl-5 py-2 border-l-2 border-indigo-900/75">
            <h1 class="text-indigo-500 uppercase font-bold text-3xl">Bejelentkezés</h1>
            <p class="text-white/75">Lépj be a fiókod hozzáféréshez.</p>
        </div>
    </div>

    <form data-toggle="form-submit-with-loader" class="mt-16" method="post" wire:submit.prevent="login">
        <div>
            <label class="auth-form-label">Email cím</label>
            <input type="email" wire:model="email" class="form-control">
        </div>
        <div class="mt-6">
            <div class="flex justify-between">
                <label class="auth-form-label">Jelszó</label>
            </div>
            <input type="password" wire:model="jelszo" class="form-control">
        </div>
        <div class="mt-10 flex flex-col gap-12">
            <div class="flex justify-between items-center w-full">
                <div>
                    <a href="{{ route('regisztracio') }}" class="p-2 border-b-2 border-white/20 text-white/75 text-sm font-medium transition hover:text-white">Regisztráció</a>
                </div>
                <button type="submit" class="relative group bg-indigo-500 flex items-center justify-center overflow-hidden duration-200 transition-colors hover:bg-indigo-600 py-4 px-6 font-medium text-white rounded-xl h-16" wire:loading.attr="disabled">
                    <span wire:loading.remove class="flex items-center justify-center">
                        <span class="flex items-center justify-center">
                            Bejelentkezés
                            <i class="fas fa-arrow-right ml-6 -mr-10 transition-all group-hover:ml-4 group-hover:mr-0 duration-200 opacity-0 group-hover:opacity-100"></i>
                        </span>
                    </span>
                    <span wire:loading class="flex items-center justify-center">
                        <span class="flex items-center justify-center">
                            Bejelentkezés
                            <svg class="animate-spin h-5 w-5 ml-3 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                            </svg>
                        </span>
                    </span>
                </button>
            </div>
        </div>
        <div class="absolute bottom-4 left-0 right-0 text-center text-white text-xs mt-6">
            <a href="https://chromecinema.hu" target="_blank">
                Minden jog fenntartva.<strong class="px-1">{{ $year }} &copy;</strong>
            </a>
        </div>
    </form>
</div>
