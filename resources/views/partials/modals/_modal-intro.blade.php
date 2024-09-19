<form class="flex flex-col text-main gap-8 sm:w-96" method="post" action="/profile/intro">
    @method('put')
    @csrf
    <div class="flex flex-col gap-2">
        <label for="intro-title">
            Titre
        </label>
        <input
            class="border border-main p-2"
            id="intro-title"
            name="intro[title]"
            value="{{ $profile->title }}"
        >
    </div>
    <div class="flex flex-col gap-2">
        <label for="intro-description">
            Description
        </label>
        <textarea
            class="border border-main p-2 h-32"
            id="intro-description"
            name="intro[introduction]"
        >{{ $profile->introduction }}</textarea>
    </div>
    <div class="flex flex-col gap-2">
        <label for="intro-available">
            Disponibilité
        </label>
        <input
            type="date"
            class="border border-main p-2"
            id="intro-available"
            name="intro[available]"
            value="{{ $profile->available->format('Y-m-d') }}"
        >
    </div>
    <div class="flex justify-center">
        <x-cta-button class="mt-4 normal-case">Valider les modifications</x-cta-button>
    </div>
</form>
