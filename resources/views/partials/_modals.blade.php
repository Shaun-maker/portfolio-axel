<x-modal id="js-intro-modal">
    <form class="flex flex-col">
        @csrf
        <label for="intro-title">Titre</label>
        <input 
            class="border border-main"
            id="intro-title" 
            name="intro-title"
        >
        <label for="intro-description">Description</label>
        <textarea
            class="border border-main"
            id="intro-description"
            name="intro-description"
        ></textarea>
        <label for="intro-available">Disponibilité</label>
        <input
            class="border border-main"
            id="intro-available"
            name="intro-available"
        >
    </form>
</x-modal>

<x-modal id="js-presentation-modal">
    maman
</x-modal>

<x-modal id="js-project-modal">
    quentin
</x-modal>