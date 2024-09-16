{{-- Horizontal line expand --}}

<div id="js-line-expand" class="h-0.5 bg-main w-0 transition-all ease-out duration-[2500ms]"></div>

{{-- top-[calc(100vh-750px)] --}}

{{-- Presentation section --}}
{{-- Animation disable, add the following : --}}
{{-- top-[calc(100vh-650px)] --}}
<section
    id="js-presentation"
    class="flex flex-col xl:flex-row px-10 sm:px-32 pb-16 bg-light gap-8 relative
     transition-all duration-[2000ms] ease-out top-[calc(100vh-650px)]"
>

    @auth
        <x-edit-button
            data-edit-button="presentation"
            isAbsolute
            class="text-base top-[296px] sm:top-[521px] horizontal-center"
        />
    @endauth

    {{-- Bloc 1 : Name and stack --}}

    <div class="flex flex-col gap-8 justify-evenly basis-1/3 order-2 xl:order-none">
        <div>
            <p class="mb-4">Axel Paillaud, <span class="whitespace-nowrap">29 ans.</span></p>
            <h3>
                {!! $profile->location !!}
            </h3>
        </div>
        <h3>
            {!! $profile->stack !!}
        </h3>
    </div>

    {{-- Bloc 2 : Pictures and social media --}}

    <div
        class="flex basis-1/3 flex-col gap-16 order-1 xl:order-none items-center
        "
    >
        <div
            class="border-x-2 border-b-2 border-main overflow-hidden
            sm:w-[512px] sm:h-[512px] w-72 h-72"
        >
            <picture class="block">
                <source srcset="{{ $profile->url_image_webp }}" type="image/webp">
                <img
                    data-parallax data-direction="up" data-speed="0.1" data-defer="20" data-end-Y="1200"
                    src="{{ $profile->url_image }}"
                    alt="Axel Paillaud, développeur web"
                    width="512" height="512"
                    class="block object-cover relative"
                >
            </picture>
            </div>
        <div class="flex justify-evenly w-full">
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

    <div
        class="basis-1/3 flex flex-col-reverse xl:flex-col justify-evenly
        items-end order-3 xl:order-none gap-16"
    >
        <x-cta-link class="self-start" href="/assets/cv/AxelPaillaud.pdf">
            télécharger mon cv
        </x-cta-link>
        <div class="text-base">
            <ul class="mb-4 flex flex-col gap-2 list-disc">
                <li>Création de site internet sur-mesure, site vitrine, portfolios</li>
                <li>Solution logicielle web sur-mesure</li>
                <li>Maintenance de site web WordPress ou PrestaShop déjà existant</li>
                <li>Accompagnement pour aider à créer son site web soi-même, avec HTML/CSS ou CMS WordPress/PrestaShop</li>
            </ul>
            <p class="mb-4">
                Plus de deux ans d'expérience pro en agence web.
            </p>
            <p class="mb-4">
                Formation OpenClassrooms Développeur web :<br>
                BAC + 2 RNCP
            </p>
        </div>
    </div>
</section>
