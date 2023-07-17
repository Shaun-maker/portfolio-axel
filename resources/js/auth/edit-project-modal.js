let editProjectButtons = document.querySelectorAll('[data-edit-project]');
let addProjectButton = document.getElementById('js-add-project');

let projectModal = document.getElementById('js-project-modal');
let projectForm = document.getElementById('js-project-form');

const onAddProjectClick = function() {
    openAddModal();
}

const onEditClick = function(event) {
    let projectId = event.target.dataset.editProject;
    openEditModal(projectId);
}

editProjectButtons.forEach(button => {
    button.addEventListener('click', onEditClick);
})

addProjectButton.addEventListener('click', onAddProjectClick);

function openAddModal () 
{
    projectModal.showModal();
}

function openEditModal (projectId) 
{
    fetch('/api/project/' + projectId)
        .then((res) => {
            if (res.ok) return res.json();
        })
        .then((res) => {
            updateEditModal(res.data);
            projectModal.showModal();
        })
        .catch()
}

function updateEditModal(data)
{
    console.log(data);
    console.log(projectForm);

    // Update thumbnail image, reuse of data-thumbnail-img instead of creatind new ID
    projectForm.closest('[data-modal]')
        .querySelector('[data-thumbnail-img]')
        .src = data.url_image;

    projectForm['project-title'].value = data.title;
    projectForm['project-description'].value = data.description;

    // Update category dropdown select
    let categories = projectForm['project-category'];
    for (let i = 0; i < categories.length; i++) {
        if (categories[i].value == data.category_id) categories[i].selected = 'true';
    }

    //console.log(projectForm['select-tools[]'][0].firstElementChild);
    let tools = projectForm['tools[]'];
    let selectTools = projectForm['select-tools[]'];

    for (let i = 0; i < data.tools.length; i++) {
        tools[i].value = data.id;
        //console.log(selectTools[i].firstElementChild.classList);
        //selectTools[i].firstElementChild.textContent = data.tools[i].icon;
        selectTools[i].firstElementChild.innerHTML = `<i class='${data.tools[i].icon}'></i>`
        //selectTools[i].firstElementChild.classList.add("fa-brands", "fa-github");
    }

    projectForm['project-link'].value = data.project_link;
    projectForm['project-source'].value = data.source_link;
}