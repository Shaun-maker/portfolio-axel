import tippy from 'tippy.js';
import 'tippy.js/dist/tippy.css';
import 'tippy.js/animations/shift-away-subtle.css'

export default function tippyInit()
{
    tippy('[data-tippy-content]', {
        animation: 'shift-away-subtle',
        theme: 'main',
    });
}

tippyInit();