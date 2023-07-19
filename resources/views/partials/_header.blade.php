{{-- If we are logged in, show edition bar, with logout button --}}

@auth
    <div 
        class="sticky top-0 left-0 bg-red-950 text-white z-50 flex
        py-2.5 px-6 justify-between"
    >
        <div class="flex justify-center w-full items-center gap-2">
            <i class="fa-solid fa-pen-to-square"></i>
            Mode édition
        </div>
        <form method="post" action="{{ route('logout') }}"
            class="flex justify-center"
        >
            @csrf
            <button type="submit" class="flex items-center gap-2">
                <i class="fa-solid fa-right-from-bracket"></i>
                Déconnexion
            </button>
        </form>
        <x-flash-success />
        <x-flash-error />
    </div>
@endauth

<header
    id="js-header"
    class="border-solid border-b-2 border-main flex items-center sticky top-0 left-0 bg-white z-40 
    translate-all ease-in-out duration-700 @auth top-[44px] @endauth"
>
    <a 
        href="/" 
        class="sm:text-5xl text-2xl font-bold text-main sm:border-r-2 border-main 
        basis-1/3 text-center sm:p-10 py-10 px-4"
    >
        <h1>Axelweb</h1>
    </a>
    @if(request()->path() === '/')
        <nav 
            class="basis-2/3 flex justify-end max-w-5xl sm:gap-16 gap-8 sm:mr-8 mr-4"
        >
            <x-navlink data="project">projets</x-navlink>
            <x-navlink data=contact>contact</x-navlink>
        </nav>
    @endif
</header>