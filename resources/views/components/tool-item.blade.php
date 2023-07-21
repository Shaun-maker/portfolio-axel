<li class="w-full">
    <button
        class="hover:bg-light whitespace-nowrap w-full py-2 px-4 transition-colors text-left"
        x-on:click="open = ! open, getTool($event)"
        x-bind:data-tool-id="tool.id"
        type="button"
        >
        <span x-html="tool.icon" class="text-xl mr-1.5 pointer-events-none">
        </span>
        <span x-text="tool.name" class="pointer-events-none"></span>
    </button>
</li>
