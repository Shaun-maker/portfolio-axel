@php
    $classes = "relative uppercase cursor-pointer
    after:absolute after:w-full after:h-px after:bg-main
    after:left-0 after:translate-y-6 after:opacity-0 
    after:transition-all after:duration-300
    hover:after:opacity-100 hover:after:translate-y-[1.30rem]";
@endphp

<a
    {{ $attributes->merge(['class' => $classes ]) }}
>
    {{ $slot }}
</a>