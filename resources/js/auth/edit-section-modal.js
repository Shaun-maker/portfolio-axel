let editSectionButtons = document.querySelectorAll('[data-edit-button');
let closeButtons = document.querySelectorAll('[data-close-modal]');

let introEditModal = document.getElementById('js-intro-modal');
let presentationEditModal = document.getElementById('js-presentation-modal');
let projectModal = document.getElementById('js-project-list-modal');
let projectEditModal = document.getElementById('js-project-edit-modal');

const openModal = function(event) {
    let editButton = event.target.dataset.editButton;
    
    if(editButton === "intro") {
        introEditModal.showModal();
    }
    else if (editButton === "presentation") {
        presentationEditModal.showModal();
    }
    else if (editButton === "project") {
        projectModal.showModal();
    }
}

const closeModal = function(event) {
    event.target.closest('[data-modal]').close();
}

editSectionButtons.forEach(button => {
    button.addEventListener('click', openModal);
});

closeButtons.forEach(button => {
    button.addEventListener('click', closeModal);
})