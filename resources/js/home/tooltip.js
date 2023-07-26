import tippy from 'tippy.js';
import 'tippy.js/dist/tippy.css';
import 'tippy.js/animations/shift-away-subtle.css'

// For modal with <dialog> tag, we have to append tippy tooltips to this modal,
// otherwise, the tooltip appear under the modal
const dialog = document.getElementById('js-project-list-modal');

if (dialog) {
    tippy('[data-tippy-content]', {
        animation: 'shift-away-subtle',
        theme: 'main',
        appendTo: dialog,
    });
}

export default function tippyInit()
{
    tippy('[data-tippy-content]', {
        animation: 'shift-away-subtle',
        theme: 'main',
    });
}

tippyInit();
