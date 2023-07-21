// Import this scripts on the homepage only if we are logged in

import Alpine from 'alpinejs';
import getProject from './auth/get-project';
 
window.Alpine = Alpine;

Alpine.data('getProject', getProject);
 
Alpine.start();

import './auth/update-thumbnail-form';
import './auth/edit-section-modal.js';
import './auth/edit-project-modal.js';