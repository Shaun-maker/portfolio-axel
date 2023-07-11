@php
    $classes = 'relative justify-center py-5 px-11 rounded-full text-base 
    uppercase flex items-center group/link bg-white text-main border-2 
    border-main';
@endphp

{{-- This main div is to hide circle when selected --}}
<div data-filter class="relative">

    {{-- Hide outside clip-path --}}
    <div class="overflow-hidden relative rounded-full z-20">
        <button data-filter-button data-fill="false"
            {{ $attributes->merge(['class' => $classes]) }}
        >
            <i 
                class="fa-solid fa-circle absolute text-[0] group-hover/link:text-xs 
                transition-all duration-700 ease-out left-7 z-30">
            </i>
            <span 
                class="filter-transition group-hover/link:translate-x-3
                 ease-out whitespace-nowrap z-30"
            >
                {{ $slot }}
            </span>
        </button>
        <div
            data-clip
            class=" z-20 bg-main absolute top-0 right-0 bottom-0 -left-10 transition-alls duration-700 ease-in-out"
            style="clip-path: polygon(0 0, 19% 100%, 0 100%, 0 0);"
        >
        </div>
    </div>

    {{-- circle animation when filter is selected --}}
    <i 
        data-circle
        class="fa-solid fa-circle absolute center-absolute top-2 z-10 transition-all
        duration-500 ease-out text-xs"
    >
    </i>
</div>
