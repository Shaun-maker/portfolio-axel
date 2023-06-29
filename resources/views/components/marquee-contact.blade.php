@php
    $animationDelay = 8;
@endphp

<div class="py-16 relative border-b-2 overflow-hidden relative flex items-center">
    @for ($i = 0; $i < 10; $i++)
        <x-marquee-contact-item animation-delay="{{ $animationDelay }}" />
        @php
            $animationDelay += 4;
        @endphp
    @endfor
</div>