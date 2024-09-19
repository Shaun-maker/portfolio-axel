<div
    x-data="{ show:true }"
    x-init="setTimeout(() => show = false, 4000)"
    x-show="show"
    x-transition
    class="absolute top-0 left-0 py-2.5 px-6
    flex gap-4"
>
    {{ $slot }}
</div>
