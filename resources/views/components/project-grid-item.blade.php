    <div class="relative w-full h-full">
        <img
            class="object-cover h-5/6 w-full aspect-square"
            height="160"
            width="128"
            src="{{ $project->url_image }}" 
            alt=""
        >
        <button 
            data-delete-project-id="{{ $project->id }}"
            class="absolute top-0 right-0 bg-light py-1 px-1.5 m-1 "
        >
            <i class="fa-solid fa-trash pointer-events-none"></i>
        </button>
        <button
            data-edit-project-id="{{ $project->id }}" 
            class="mt-1 whitespace-nowrap h-1/6"
        >
            <i class="fa-solid fa-pen-to-square mr-1 pointer-events-none"></i>
            éditer
        </button>
    </div>