<x-modal id="js-intro-modal">
    @include('partials.modals._modal-intro')
</x-modal>

<x-modal id="js-presentation-modal">
    @include('partials.modals._modal-presentation')
</x-modal>

{{-- This div is for alpine directive : fetch project, then populate modal form --}}
<div x-data="getProject">
    <x-modal id="js-project-list-modal">
        @include('partials.modals._modal-project')
    </x-modal>
    
    <x-modal id="js-project-modal">
        @include('partials.modals._modal-edit-project')
    </x-modal>
</div>
