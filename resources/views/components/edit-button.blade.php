@php
    $classes = 'text-base ';

    if($attributes['isAbsolute']) $classes .= 'absolute';
@endphp

<button
{{--     @class([
        'absolute' => $attributes['isAbsolute'],
        ]) --}}
    {{ $attributes->merge(['class' =>  $classes ]) }}
>
    <i class="fa-solid fa-pen-to-square"></i>
    Modifier
</button>