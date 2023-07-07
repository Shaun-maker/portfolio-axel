<a href="{{ $href ?? '#' }}" target="_blank"
    class="flex flex-col items-center gap-1"
>
    <i class="text-3xl {{ $attributes->get('class') }}"></i>
    <span>
        {{ $slot }}
    </span>
</a>