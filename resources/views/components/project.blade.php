@props(['loop', 'project', 'animDelay'])

<article
    class="flex flex-col lg:flex-row max-w-[1400px]"
    style="animation-delay: {{ $animDelay }}s"
>
    <a
        target="_blank"
        @if($project->project_link)
            href="{{ $project->project_link }}"
        @elseif($project->source_link)
            href="{{ $project->source_link }}"
        @endif
        class="group bg-gray-100 sm:px-24 sm:py-12 px-14 py-8 basis-5/12 flex justify-center 
        transition-all duration-300 hover:rounded-[32px] hover:bg-gray-200"
    >
        <picture class="">
            <source 
                srcset="{{ $project->url_image_webp }}" 
                type="image/webp" 
            >
            <img
                src="{{ $project->url_image }}" 
                alt="lorem-ipsum-dolor-sit-amet"
                class="opacity-40 object-cover transition-all w-full h-full
                group-hover:opacity-50 duration-700 group-hover:scale-105"
                width="400" height="400"
            >
        </picture>
    </a>
    <div class="lg:w-0.5 lg:h-auto h-0.5 w-full bg-main my-8 lg:my-0 lg:mx-14"></div>
    <div class="basis-7/12 flex flex-col justify-between gap-10">
        <h4 
            class="sm:text-3xl text-2xl uppercase text-center">
            {{ $project->title }}
        </h4>
        <div class="flex flex-col gap-4">
            {!! $project->description !!}
        </div>
        {{-- Start time and End time --}}
        @if($project->start_date || $project->end_date)
            <div class="text-sm">
                <p class="inline">Début : 
                    <time datetime="{{ $project->start_date->format('Y-m-d') }}" 
                    >
                        {{ $project->start_date->translatedFormat('M Y') }}
                    </time>
                </p>
                <p class="inline ml-4">Fin : 
                    @if($project->end_date)
                        <time datetime="{{ $project->end_date->format('Y-m-d') }}" 
                        >
                            {{ $project->end_date->translatedFormat('M Y') }}
                        </time>
                    @else
                        <span>En cours</span>
                    @endif
                </p>
            </div>
        @endif
        <div class="flex justify-center gap-8  mb-4">
            @foreach ($project->tools as $tool)
            <span data-tippy-content="{{ $tool->name }}" class="text-2xl">
                {!! $tool->icon !!}
            </span>
            @endforeach
        </div>
        @if($project->project_link || $project->source_link)
            <div 
                class="flex sm:flex-row flex-col justify-evenly gap-8 sm:gap-4"
            >
                @if(!$project->project_link)
                    <x-cta-link-disable>voir le projet</x-cta-link>
                @else
                    <x-cta-link href="{{ $project->project_link }}">voir le projet</x-cta-link>
                @endif

                @if(!$project->source_link)
                    <x-cta-link-disable wireframe="true">Voir le code source</x-cta-link>
                @else
                    <x-cta-link href="{{ $project->source_link }}" wireframe="true">Voir le code source</x-cta-link>
                @endif
            </div>
        @endif
    </div>
</article>