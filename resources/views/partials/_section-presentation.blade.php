{{-- Horizontal line expand --}}

<div id="js-line-expand" class="h-0.5 bg-main w-0 transition-all ease-out duration-[2500ms]"></div>

{{-- top-[calc(100vh-750px)] --}}

{{-- Presentation section --}}
{{-- Animation disable, add the following : --}}
{{-- top-[calc(100vh-650px)] --}}
<section
    id="js-presentation"
    class="px-6 pb-2 bg-light relative transition-all duration-[2000ms]
    ease-out top-[calc(100vh-650px)]"
>

    @auth
        <x-edit-button
            data-edit-button="presentation"
            isAbsolute
            class="text-base top-[296px] sm:top-[521px] horizontal-center"
        />
    @endauth

    {{-- Description and picture --}}
    <div class="flex flex-col-reverse gap-16 sm:gap-24 xl:flex-row xl:gap-52 justify-center">

        {{-- Description --}}
        <div class="xl:pt-16 mx-auto xl:mx-0 sm:w-[512px] xl:w-auto w-72 max-w-[512px]">
            {{ !! $profile->description !! }}
        </div>

        {{-- Picture --}}
        <div
            class="border-x-2 border-b-2 border-main overflow-hidden
            sm:w-[512px] sm:h-[512px] sm:max-w-fit max-w-72 w-full h-72 mx-auto xl:mx-0"
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
    </div>

    {{-- CTA and social media --}}
    <div class="flex w-full justify-center flex-col sm:flex-row gap-16 mt-32 mb-40 items-center">
        <div class="flex gap-16">
            <x-social-media
                class="fa-brands fa-github group-hover:scale-110 transition"
                href="https://github.com/axel-paillaud"
            >
                GitHub
            </x-social-media>
            <x-social-media
                class="fa-brands fa-linkedin group-hover:scale-110 transition"
                href="https://www.linkedin.com/in/axel-paillaud/"
            >
                LinkedIn
            </x-social-media>
        </div>
        <x-cta-link href="/assets/cv/AxelPaillaud.pdf">
            télécharger mon cv
        </x-cta-link>
    </div>

</section>
