<dialog open 
    id="{{ $id ?? '' }}"
    data-modal
    class="modal animate-zoomIn rounded-xl pb-10 px-12
    sm:pb-16 pt-12 sm:px-40 fixed w-full sm:w-fit"
>
    <button 
        data-close-modal
        class="absolute left-0 top-0 rounded-full p-1 m-2 hover:bg-light transition-colors">
        <i class="fa-solid fa-xmark m-1"></i>
    </button>
    {{ $slot }}
</dialog>