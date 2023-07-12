<section >

    <x-marquee-project />

    <x-category-list />

    <div class="sm:px-12 gap-24 px-6 my-20 flex flex-col justify-center items-center">
        @foreach($projects as $project)

        <x-project 
            :$loop
            :title="$project->title"
            :urlImg="$project->url_image"
            :description="$project->description"
            :projectLink="$project->project_link"
            :sourceLink="$project->source_link"
            :tools="$project->tools"
        />

        @endforeach
    </div>
</section>