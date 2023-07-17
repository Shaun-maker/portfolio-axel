<li class="w-full">
    <button
        class="hover:bg-light whitespace-nowrap w-full py-2 px-4 transition-colors text-left"
        x-on:click="toolId = '{{ $tool->id}}', open = ! open, toolClass = '{{ $tool->icon }}'"
        data-tools-id="{{ $tool->id }}" 
        type="button"
        >
        <i class="{{ $tool->icon }} text-xl mr-1.5"></i>
        {{ $tool->name }}
    </button>
</li>