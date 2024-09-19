<form
    method="post" action="/profile/presentation"
    enctype="multipart/form-data"
    class="flex flex-col text-main gap-8 sm:w-80"
>
    @method('put')
    @csrf
    <div class="flex flex-col items-center">
        <img
            data-thumbnail-img
            src="{{ $profile->url_image_webp }}"
            alt="Photo de profil"
            width="300"
            height="300"
            class="object-cover object-top w-72 h-72 mb-8"
        >
        <label
            for="presentation-image"
            class="cursor-pointer border bg-white text-main border-2 border-main
            py-4 px-8 rounded-full text-base"
        >
            <input id="presentation-image" name="presentation[image]" type="file" accept="image/*" class="hidden">
            Modifier la photo
        </label>
    </div>
    <div class="flex flex-col gap-2">
        <label for="presentation-description">
            Description
        </label>
        <textarea
            class="border border-main p-2 min-h-80"
            id="presentation-description"
            name="presentation[description]"
        >{{ $profile->description }}</textarea>
    </div>
    <div class="flex justify-center">
        <x-cta-button class="mt-4 normal-case">Valider les modifications</x-cta-button>
    </div>
</form>
