    <div class="relative w-full h-full">
        <picture>
            <source srcset="{{ $project->url_image_webp }}" type="image/webp">
            <img
            class="object-cover h-5/6 w-full aspect-square"
            height="160"
            width="128"
            src="{{ $project->url_image }}" 
            alt=""
        >
        </picture>
        <form method="post" action="/project/{{ $project->id }}">
            @csrf
            @method('delete')
            <button 
                class="absolute top-0 right-0 bg-light py-1 px-1.5 m-1 "
            >
                <i class="fa-solid fa-trash pointer-events-none"></i>
            </button>
        </form>
        <button
            @click="getProject($event)"
            data-edit-project="{{ $project->id }}" 
            class="mt-1 whitespace-nowrap h-1/6"
        >
            <i class="fa-solid fa-pen-to-square mr-1 pointer-events-none"></i>
            éditer
        </button>
    </div>