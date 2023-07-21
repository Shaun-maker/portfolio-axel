let editProjectButtons = document.querySelectorAll('[data-edit-project]');
let addProjectButton = document.getElementById('js-add-project');

let projectModal = document.getElementById('js-project-modal');
let projectForm = document.getElementById('js-project-form');

const onAddProjectClick = function() {
    openAddModal();
}

addProjectButton.addEventListener('click', onAddProjectClick);

function openAddModal () 
{
    projectModal.showModal();
}
