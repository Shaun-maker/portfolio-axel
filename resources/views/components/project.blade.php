<article class="flex flex-col lg:flex-row max-w-[1400px] ">
    <a
        @if($projectLink)
            href="{{ $projectLink }}"
        @elseif($sourceLink)
            href="{{ $hsourceLink}}"
        @endif
        class="group bg-gray-100 sm:px-24 sm:py-12 px-14 py-8 basis-5/12 flex justify-center 
        transition-all duration-300 hover:rounded-[32px] hover:bg-gray-200"
    >
        <img 
            src="{{ $urlImg }}" 
            alt="lorem-ipsum-dolor-sit-amet"
            class="opacity-40 object-cover transition-all 
            group-hover:opacity-50 duration-700 group-hover:scale-105"
            width="400" height="400"
        >
    </a>
    <div class="lg:w-0.5 lg:h-auto h-0.5 w-full bg-main my-8 lg:my-0 lg:mx-14"></div>
    <div class="basis-7/12 flex flex-col justify-between gap-10">
        <h4 class="sm:text-3xl text-2xl uppercase text-center">{{ $title }}</h4>
        <div class="flex flex-col gap-4">
            {!! $description !!}
        </div>
        <div class="flex justify-center gap-8">
            @foreach ($tools as $tool)
                <i class="{{ $tool->icon }} text-2xl"></i>
            @endforeach
        </div>
        <div class="flex sm:flex-row flex-col justify-evenly gap-8 sm:gap-4">
            @if(!$projectLink)
                <x-cta-link-disable>voir le projet</x-cta-link>
            @else
                <x-cta-link href="{{ $projectLink }}">voir le projet</x-cta-link>
            @endif

            @if(!$sourceLink)
                <x-cta-link-disable wireframe="true">Voir le code source</x-cta-link>
            @else
                <x-cta-link href="{{ $sourceLink }}" wireframe="true">Voir le code source</x-cta-link>
            @endif
        </div>
    </div>
</article>