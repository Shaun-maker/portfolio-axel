@php
    $classes = 'relative justify-center py-5 px-11 rounded-full text-base 
    uppercase flex items-center group/link bg-white text-main border-2 
    border-main';
@endphp

<button
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