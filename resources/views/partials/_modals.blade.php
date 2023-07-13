<x-modal id="js-intro-modal">
    <form class="flex flex-col text-main gap-8 sm:w-80">
        @csrf
        <div class="flex flex-col gap-2">
            <label for="intro-title">
                Titre
            </label>
            <input 
                class="border border-main p-2"
                id="intro-title" 
                name="intro-title"
            >
        </div>
        <div class="flex flex-col gap-2">
            <label for="intro-description">
                Description
            </label>
            <textarea
                class="border border-main p-2"
                id="intro-description"
                name="intro-description"
            ></textarea>
        </div>
        <div class="flex flex-col gap-2">
            <label for="intro-available">
                Disponibilité
            </label>
            <input
                class="border border-main p-2"
                id="intro-available"
                name="intro-available"
            >
        </div>
        <div class="flex justify-center">
            <x-cta-button class="mt-4 normal-case">Valider les modifications</x-cta-button>
        </div>
    </form>
</x-modal>

<x-modal id="js-presentation-modal">
    maman
</x-modal>

<x-modal id="js-project-modal">
    quentin
</x-modal>