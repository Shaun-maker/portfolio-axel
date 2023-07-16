let projectEditButtons = document.querySelectorAll('[data-edit-project]');
let projectEditModal = document.getElementById('js-project-edit-modal');

const onClick = function(event) {
    let projectId = event.target.dataset.editProject;
    openModal(projectId);
}

projectEditButtons.forEach(button => {
    button.addEventListener('click', onClick);
})

function openModal (projectId) {
    projectEditModal.showModal();
}