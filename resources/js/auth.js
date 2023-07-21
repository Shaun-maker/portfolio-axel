// Import this scripts on the homepage only if we are logged in

import Alpine from 'alpinejs';
import editProject from './auth/edit-project';
 
window.Alpine = Alpine;

Alpine.data('editProject', editProject);
 
Alpine.start();

import './auth/update-thumbnail-form';
import './auth/edit-section-modal.js';