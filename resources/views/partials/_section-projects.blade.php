<section >

    <x-marquee-project />

    <x-category-list />

    <div class="relative">
        <div 
            id="js-project-container"
            class="sm:px-12 gap-24 px-6 my-20 flex flex-col justify-center 
            items-center"
        >
            @php
                $animDelay = 0.0;
            @endphp

            @foreach($projects as $project)

            <x-project :$loop :$project :$animDelay />

            @php
                $animDelay += 0.15;
            @endphp

            @endforeach
        </div>
    </div>
</section>