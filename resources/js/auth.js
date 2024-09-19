// Import this scripts on the homepage only if we are logged in

import Alpine from 'alpinejs';
import editProject from './auth/edit-project';

window.Alpine = Alpine;

Alpine.data('editProject', editProject);

Alpine.start();

import './auth/update-thumbnail-form';
import './auth/edit-section-modal.js';

// Disable smooth-scroll on auth
import { lenis } from './home/smooth-scroll';

lenis.destroy();
