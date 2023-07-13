let editButtons = document.querySelectorAll('[data-edit-button');
let introEditModal = document.getElementById('js-intro-modal');
let presentationEditModal = document.getElementById('js-presentation-modal');
let projectEditModal = document.getElementById('js-project-modal');

const openModal = function(event) {
    let editButton = event.target.dataset.editButton;
    
    if(editButton === "intro") {
        introEditModal.showModal();
    }
    else if (editButton === "presentation") {
        presentationEditModal.showModal();
    }
    else if (editButton === "project") {
        projectEditModal.showModal();
    }
}

editButtons.forEach(button => {
    button.addEventListener('click', openModal);
});
