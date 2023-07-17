<li class="w-full">
    <button
        class="hover:bg-light whitespace-nowrap w-full py-2 px-4 transition-colors text-left"
        x-on:click="
            if (tools.includes({{ $tool->id }})) {
                toolClass = ''
                open = ! open
            }
            else {
                toolId = '{{ $tool->id }}'
                open = ! open
                toolClass = '{{ $tool->icon }}'
                tools.push({{ $tool->id }})
            }
        "
        data-tools-id="{{ $tool->id }}" 
        type="button"
        >
        <i class="{{ $tool->icon }} text-xl mr-1.5"></i>
        {{ $tool->name }}
    </button>
</li>

{{-- x-on:click="
console.log(tools.includes({{ $tool->id }})),
tools.includes({{ $tool->id }}) ? toolClass = '' :
    toolId = '{{ $tool->id }}', 
    open = ! open, toolClass = '{{ $tool->icon }}', 
    tools.push({{ $tool->id }}),
    console.log('hello' + toolClass)
" --}}