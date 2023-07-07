{{-- Horizontal line expand --}}

<div id="js-line-expand" class="h-0.5 bg-main w-0 transition-all ease-out duration-[2500ms]"></div>

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
        <div class="border-x-2 border-b-2 border-main overflow-hidden" >
            <picture class="block w-[512px] h-[512px]">
                <source srcset="images/profile.webp" type="image/webp">
                <img
                    data-parallax data-direction="up" data-speed="0.1"
                    src="images/profile.jpg" 
                    alt="Axel Paillaud, développeur web"
                    width="512" height="512"
                    class="block object-cover relative"
                >
            </picture>
            </div>
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
        <x-cta-button class="self-center">
            voir mes projets
        </x-cta-button>
        <h3 class="max-w-[20rem]">
            Développeur web sur Orléans, Loiret.<br>
            Mobile sur Tours, Blois, Paris.<br>
            Ouvert au full remote.
        </h3>
    </div>
</section>