<dialog 
    id="{{ $id ?? '' }}"
    class="modal animate-zoomIn rounded-xl py-16 px-40 fixed"
>
    <button 
        data-close-modal
        class="absolute left-0 top-0 rounded-full p-1 m-2 hover:bg-light transition-colors">
        <i class="fa-solid fa-xmark m-1"></i>
    </button>
    {{ $slot }}
</dialog>