@php
    $classes = 'relative justify-center py-5 px-11 rounded-full text-base 
    uppercase flex items-center group/link bg-white text-main border-2 
    border-main';
@endphp

<div id="js-parent-clip" class="relative px-12">
    <button id="js-filter-btn"
        {{ $attributes->merge(['class' => $classes]) }}
    >
        <i 
            class="fa-solid fa-circle absolute text-[0] group-hover/link:text-xs 
            transition-all duration-700 ease-out left-7">
        </i>
        <span 
            class="group-hover/link:translate-x-3 transition-transform duration-700
            ease-out whitespace-nowrap"
        >
            {{ $slot }}
        </span>
    </button>
    <div
        id="js-filter-clip"
        class="bg-main absolute inset-0 transition-all duration-500"
        style="clip-path: polygon(0 0, 19% 100%, 0 100%, 0 0);"
    >
    </div>
</div>
