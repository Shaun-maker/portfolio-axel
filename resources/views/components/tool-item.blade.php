<li class="w-full">
    <button
        class="hover:bg-light whitespace-nowrap w-full py-2 px-4 transition-colors text-left"
        {{--         
            If the tool selected is the same of the tool already selected, do nothing
            If the tool selected is already present in another input, do nothing
            Else, we can select this tool 
        --}}
        x-on:click="
            if (toolId === '{{ $tool->id }}') ''
            else if (tools.includes({{ $tool->id }})) ''
            else {
                toolId = '{{ $tool->id }}'
                toolClass = '{{ $tool->icon }}'
                tools.push({{ $tool->id }})
            }
            open = ! open
            "
        data-tools-id="{{ $tool->id }}" 
        type="button"
        >
        <i class="{{ $tool->icon }} text-xl mr-1.5"></i>
        {{ $tool->name }}
    </button>
</li>
