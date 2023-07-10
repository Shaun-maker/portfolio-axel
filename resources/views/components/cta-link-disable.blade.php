@php
    $classes = 'relative py-5 px-11 rounded-full justify-center 
    text-base uppercase flex items-center cursor-not-allowed';

    if(isset($attributes['wireframe']) && $attributes['wireframe'] == 'true') {
        $classes .= ' bg-white text-gray-500 border-2 border-gray-500';
    }
    else {
        $classes .= ' text-white  bg-gray-500';
    }
@endphp

<div
    {{ $attributes->merge(['class' => $classes]) }}
>
    <div 
        class="whitespace-nowrap"
    >
        {{ $slot }}
    </div>
</div>