<article class="flex flex-col lg:flex-row max-w-[1400px] ">
    <a
        href="#"
        class="group bg-gray-100 sm:px-24 sm:py-12 px-14 py-8 basis-5/12 flex justify-center 
        transition-all duration-300 hover:rounded-[32px] hover:bg-gray-200"
    >
        <img 
            src="/images/projects/resize-web-single-image.png" 
            alt="lorem-ipsum-dolor-sit-amet"
            class="opacity-40 object-cover transition-all 
            group-hover:opacity-50 duration-700 group-hover:scale-105"
            width="400" height="400"
        >
    </a>
    <div class="lg:w-0.5 lg:h-auto h-0.5 w-full bg-main my-8 lg:my-0 lg:mx-14"></div>
    <div class="basis-7/12 flex flex-col justify-between gap-10">
        <p>{{ $title }}</p>
        <p>{{ $urlImg }}</p>
        {{ $description }}
        {{ $projectLink }}
        {{ $sourceLink }}
        <h4 class="sm:text-3xl text-2xl uppercase text-center">resize web gui</h4>
        <div class="flex flex-col gap-4">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
                 sit amet nunc mi. Aliquam a velit eros. Duis volutpat, mi id 
                 convallis sagittis, erat nibh sollicitudin lorem, sollicitudin 
                 vestibulum purus tortor nec eros. Curabitur cursus pharetra consequat.
            </p> 
            <p>
                Fusce hendrerit rutrum dapibus. Suspendisse et luctus neque. 
                Aliquam sed eleifend mi, non bibendum nisi. Praesent vel finibus ex. 
                Quisque vestibulum purus vel diam posuere, ac lacinia justo vulputate. 
                Sed luctus nisi at dapibus sodales. Aliquam erat volutpat.
            </p>
        </div>
        <div class="flex justify-center gap-8">
            <i class="fa-brands fa-github text-2xl"></i>
            <i class="fa-brands fa-laravel text-2xl"></i>
            <i class="fa-brands fa-php text-2xl"></i>
            <i class="fa-brands fa-js text-2xl"></i>
        </div>
        <div class="flex sm:flex-row flex-col justify-evenly gap-8 sm:gap-4">
            {{-- <x-cta-link href="#">Voir le projet</x-cta-link> --}}
            <x-cta-link-disable>voir le projet</x-cta-link-disable>
            <x-cta-link href="#" wireframe="true">Voir le code source</x-cta-link>
        </div>
    </div>
</article>