<section >

    <x-marquee-project />

    <x-category-list />

    <div 
        id="js-project-container"
        class="sm:px-12 gap-24 px-6 my-20 flex flex-col justify-center items-center"
    >
        @foreach($projects as $project)

        <x-project :$loop :$project />

        @endforeach
    </div>
</section>