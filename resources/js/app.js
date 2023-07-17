import './bootstrap';
import '@fortawesome/fontawesome-free/css/all.min.css';

import Alpine from 'alpinejs';

Alpine.store('tool', {
    open: false, 
    toolId: '', 
    toolClass: '',
})
 
window.Alpine = Alpine;
 
Alpine.start();
