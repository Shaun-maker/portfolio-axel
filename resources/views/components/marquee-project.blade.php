@php
    $animationDelay = 8;
@endphp

<div id="project" class="pt-[31px] pb-[36px] flex items-center border-main
    border-b-2 border-t-2 mb-2 overflow-hidden relative"
>
    @for ($i = 0; $i < 5; $i++)
        <x-marquee-project-item animation-delay="{{ $animationDelay }}" />
        @php
            $animationDelay += 8;
        @endphp
    @endfor
</div>
