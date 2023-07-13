<section>

    <x-marquee-project />

    <x-category-list />

    <div class="relative my-20 h-[6000px]" id="js-project-container">
        <div 
            data-project-wrapper
            class="sm:px-12 gap-24 px-6 flex flex-col justify-center 
            items-center absolute w-full"
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