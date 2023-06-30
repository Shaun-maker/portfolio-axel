{{-- Presentation section --}}
<section class="text-2xl flex px-32 pb-16 bg-light gap-16">

    {{-- Bloc 1 : Name and stack --}}

    <div class="flex flex-col justify-evenly basis-1/3">
        <p>Axel Paillaud, <span class="whitespace-nowrap">28 ans</span></p>
        <h3>
            Fullstack<br>
            PHP/Laravel<br>
            Javascript,<br>
            & more
        </h3>
    </div>

    {{-- Bloc 2 : Pictures and social media --}}

    <div class="flex basis-1/3 flex-col gap-16">
        <picture class="block w-[512px] h-[512px]">
            <source srcset="images/profile.webp" type="image/webp">
            <img 
                src="images/profile.jpg" 
                alt="Axel Paillaud, développeur web"
                width="512" height="512"
                class="block w-[512px] h-[512px] object-cover object-top border-x-2 border-b-2 border-main"
            >
        </picture>
        <div class="flex justify-evenly">
            <x-social-media 
                class="fa-brands fa-github"
                href="https://github.com/axel-paillaud"
            >
                GitHub
            </x-social-media>
            <x-social-media 
                class="fa-brands fa-linkedin"
                href="https://www.linkedin.com/in/axel-paillaud/"
            >
                LinkedIn
            </x-social-media>
        </div>
    </div>

    {{-- Bloc 3 : CTA button and geographic mobility --}}

    <div class="basis-1/3 flex flex-col justify-evenly items-end">
        <a 
            href="#"
            class="relative text-white bg-main py-5 px-11 rounded-full self-center
            text-base uppercase flex items-center group"
        >
            <i 
                class="fa-solid fa-circle absolute text-[0] group-hover:text-xs 
                transition-all duration-500 ease-out left-7">
            </i>
            <div 
                class="group-hover:translate-x-3.5 transition-transform duration-500
                ease-out"
            >
                voir mes projets
            </div>
        </a>
        <h3 class="max-w-[20rem]">
            Développeur web sur Orléans, Loiret.<br>
            Mobile sur Tours, Blois, Paris.<br>
            Ouvert au full remote.
        </h3>
    </div>
</section>