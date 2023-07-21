<div class="text-main flex flex-col items-center">
    <h5 class="uppercase text-center text-5xl mb-16">projets</h5>
    {{-- Grid container --}}
    <div 
        class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-5 gap-6"
    >
        {{-- Grid child --}}
        @foreach($projects as $project)
            <x-project-grid-item :$project />
        @endforeach
    </div>
    <hr class="w-4/5 my-8 border-main">
    <x-cta-button x-on:click="addProject()">ajouter un projet</x-cta-button>
</div>