<li class="w-full">
    <button
        class="hover:bg-light whitespace-nowrap w-full py-2 px-4 transition-colors text-left"
        {{--         
            If the tool selected is the same of the tool already selected, do nothing
            If the tool selected is already present in another input, do nothing
            Else, we can select this tool 
        --}}
        x-on:click="open = ! open, getTool($event)"
        data-tool-id="{{ $tool->id }}" 
        type="button"
        >
        <span class="text-xl mr-1.5 pointer-events-none">
            {!! $tool->icon !!}
        </span>
        {{ $tool->name }}
    </button>
</li>

{{-- x-on:click="
if (toolId === '{{ $tool->id }}') ''
else if (tools.includes({{ $tool->id }})) ''
else {
    toolId = '{{ $tool->id }}'
    toolClass = `{{ $tool->icon }}`
    tools.push({{ $tool->id }})
}
open = ! open
" --}}

{{-- x-on:click="
project.tools[{{ $i }}].id = '{{ $tool->id }}',
project.tools[{{ $i }}].name = '{{ $tool->name }}',
project.tools[{{ $i }}].icon = '{{ $tool->icon }}',
open = ! open
" --}}