<a href="{{ $href ?? '#' }}" target="_blank"
    class="flex flex-col items-center gap-1"
>
    <i {{ $attributes->merge(['class' => 'text-4xl']) }}></i>
    <span>
        {{ $slot }}
    </span>
</a>