<section >

    <x-marquee-project />

    {{-- Filter here, TODO --}}
    <div class="h-72"></div>

    <div class="sm:px-12 gap-24 px-6 my-20 flex flex-col justify-center items-center">
        @foreach($projects as $project)
        <x-project 
            :title="$project->title"
            :urlImg="$project->url_image"
            :description="$project->description"
            :projectLink="$project->project_link"
            :sourceLink="$project->source_link"
        />

        @endforeach
    </div>
</section>