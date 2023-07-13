<x-modals.intro>
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
</x-modals.intro>

<x-modals.presentation>
    maman
</x-modals.presentation>

<x-modals.project>
    quentin
</x-modals.project>