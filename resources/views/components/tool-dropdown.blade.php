<div class="relative" x-data="{ open:false }">
    <button
        x-on:click="open = ! open"
        type="button" 
        class="flex items-center gap-1.5 p-4 pb-2"
    >
        <i class="fa-brands fa-github text-xl"></i>
        <i class="fa-solid fa-chevron-down text-xs"></i>
    </button>
    <ul
        x-show="open" x-transition @click.outside="open = false"
        class="absolute z-20 bg-white flex flex-col gap-2 shadow-md 
        "
    >
        @foreach($tools as $tool)
            <x-tool-item :$tool />
        @endforeach
    </ul>
    <input class="hidden">
</div>