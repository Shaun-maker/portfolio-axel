@props(['loop', 'project'])

{{-- All data-project html attribute is for AJAX filter request in filter.js file --}}

<article
    data-project
    class="flex flex-col lg:flex-row max-w-[1400px]"
>
    <a
        data-project-img-container
        @if($project->project_link)
            href="{{ $project->project_link }}"
        @elseif($project->source_link)
            href="{{ $project->source_link }}"
        @endif
        class="group bg-gray-100 sm:px-24 sm:py-12 px-14 py-8 basis-5/12 flex justify-center 
        transition-all duration-300 hover:rounded-[32px] hover:bg-gray-200"
    >
        <img
            data-project-img 
            src="{{ $project->url_image }}" 
            alt="lorem-ipsum-dolor-sit-amet"
            class="opacity-40 object-cover transition-all 
            group-hover:opacity-50 duration-700 group-hover:scale-105"
            width="400" height="400"
        >
    </a>
    <div class="lg:w-0.5 lg:h-auto h-0.5 w-full bg-main my-8 lg:my-0 lg:mx-14"></div>
    <div class="basis-7/12 flex flex-col justify-between gap-10">
        <h4 
            data-project-title
            class="sm:text-3xl text-2xl uppercase text-center">
            {{ $project->title }}
        </h4>
        <div data-project-description class="flex flex-col gap-4">
            {!! $project->description !!}
        </div>
        <div data-project-tools class="flex justify-center gap-8">
            @foreach ($project->tools as $tool)
                <i class="{{ $tool->icon }} text-2xl"></i>
            @endforeach
        </div>
        <div data-project-link class="flex sm:flex-row flex-col justify-evenly gap-8 sm:gap-4">
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
    </div>
</article>