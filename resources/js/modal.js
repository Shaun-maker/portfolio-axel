let editButtons = document.querySelectorAll('[data-edit-button');

const openModal = function(event) {
    let editButton = event.target.dataset.editButton;
    console.log(editButton);
}

editButtons.forEach(button => {
    button.addEventListener('click', openModal);
});
