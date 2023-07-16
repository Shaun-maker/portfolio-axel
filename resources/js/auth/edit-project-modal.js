let projectEditButtons = document.querySelectorAll('[data-edit-project]');
let projectEditModal = document.getElementById('js-project-edit-modal');

const onClick = function(event) {
    console.log(event.target.dataset.editProject);
    openModal();
}

projectEditButtons.forEach(button => {
    button.addEventListener('click', onClick);
})

function openModal () {
    projectEditModal.showModal();
}