@php
    $classes = 'relative bg-main py-5 px-11 rounded-full 
    text-base uppercase flex items-center group';

    if(isset($attributes['wireframe']) && $attributes['wireframe'] == 'true') {
        $classes .= ' bg-white text-main border-2 border-main';
    }
    else {
        $classes .= ' bg-main text-white';
    }
@endphp

<a
    {{ $attributes->merge(['class' => $classes]) }}
>
    <i 
        class="fa-solid fa-circle absolute text-[0] group-hover:text-xs 
        transition-all duration-700 ease-out left-7">
    </i>
    <div 
        class="group-hover:translate-x-3 transition-transform duration-700
        ease-out whitespace-nowrap"
    >
        {{ $slot }}
    </div>
</a>