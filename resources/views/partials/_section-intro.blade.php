<section data-parallax data-speed="0.4" data-end-Y="800"
    class="relative -z-10 lg:pb-24 lg:pr-24 lg:pl-60 lg:pt-72 border-main
        pb-20 sm:pr-12 sm:pl-32 pt-48 pr-4 pl-4"
>
    @auth
        <x-edit-button
            data-edit-button="intro"
            isAbsolute
            class="top-40 right-6 sm:top-44 sm:right-14 lg:top-64 lg:right-24" 
        />
    @endauth
    <h2 id="js-split-text" 
        class="text-5xl sm:text-8.5xl lg:w-4/5 ml-auto mb-20 flex justify-end gap-5 flex-wrap
        invisible"
    >
        {{ $profile->title }}
    </h2>
    <div class="flex gap-24">
        <img src="svg/arrow-down.svg" alt="" class="relative top-12">
        <p class="sm:w-1/3 animate-fadeIn opacity-0" 
            style="animation-delay: 1s; animation-fill-mode: forwards;"
        >
            {{ $profile->description }}
        </p>
    </div>
    <p class="text-right mt-8 sm:m-0">Dispo. : {!! $profile->available !!}</p>
</section>
