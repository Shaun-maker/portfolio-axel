<form 
    enctype="multipart/form-data"
    method="post"
    id="js-project-form" 
    class="flex flex-col text-main gap-8 sm:w-full"
>
    @csrf
    <div class="flex flex-col items-center">
        <img 
            data-thumbnail-img
            src="/images/projects/resize-web-fakedata.png"
            x-bind:src="project.url_image" 
            alt="Photo de profil"
            width="300"
            height="300"
            class="object-cover object-top w-72 h-72 mb-8"
        >
        <label 
            for="project-image" 
            class="cursor-pointer border bg-white text-main border-2 border-main
            py-4 px-8 rounded-full text-base"
        >
            <input id="project-image" name="project-image" type="file" accept="image/*" class="hidden">
            Modifier l'image
        </label>
    </div>
    <div class="flex flex-col gap-2">
        <label for="project-title">
            Titre
        </label>
        <input 
            class="border border-main p-2"
            id="project-title" 
            name="project-title"
            x-bind:value="project.title"
        >
    </div>
    <div class="flex flex-col gap-2">
        <label for="project-description">
            Description
        </label>
        <textarea
            class="border border-main p-2 h-72"
            id="project-description"
            name="project-description"
            x-text="project.description"
        ></textarea>
    </div>
    <div class="flex flex-col gap-2">
        <label for="project-category">
            Catégorie
        </label>
        <select 
            x-model="project.category_id"
            class="border border-main p-2 bg-white uppercase" 
            name="project-category" 
            id="project-category"
        >
            @foreach($categories as $category)
                <option
                    value="{{ $category->id }}"
                >
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    {{-- Tools (technos) --}}
    <div class="flex flex-col gap-2">
        <label for="project-tools">
            Technos
        </label>
        <div class="flex flex-wrap">
            <x-tool-dropdown :$tools />
            <x-tool-dropdown :$tools />
            <x-tool-dropdown :$tools />
            <x-tool-dropdown :$tools />
            <x-tool-dropdown :$tools />
            <x-tool-dropdown :$tools />
        </div>
    </div>
    <div class="flex flex-col gap-2">
        <label for="project-link">
            Lien vers le projet
        </label>
        <input 
            class="border border-main p-2"
            id="project-link" 
            name="project-link"
            x-bind:value="project.project_link"
        >
    </div>
    <div class="flex flex-col gap-2">
        <label for="project-source">
            Lien vers le code source
        </label>
        <input 
            class="border border-main p-2"
            id="project-source" 
            name="project-source"
            x-bind:value="project.source_link"
        >
    </div>
    <div class="flex justify-center">
        <x-cta-button class="mt-4 normal-case">Valider les modifications</x-cta-button>
    </div>
</form>