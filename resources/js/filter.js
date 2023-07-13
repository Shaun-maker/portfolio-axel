let filterButtons = document.querySelectorAll('[data-filter-button]');

// Calculate the total height of project, for project container in absolute position
setHeightToAbsoluteProjectContainer(document.querySelector('[data-project-wrapper]'));

filterButtons.forEach((filterButton) => {

    // fill default filter set to true, at the load of the page
    if(filterButton.dataset.fill === 'true') {
        fillBtnFilter(filterButton);
    }

    // empty other filter when we click on a filter
    filterButton.addEventListener('click', () => {
        filterButtons.forEach((filterButton) => {
            if (filterButton.dataset.fill === "true") {
                emptyBtnFilter(filterButton);
            }
        })
    })

    filterButton.addEventListener('click', (event) => {

        // fill filter button when we click on it
        if (filterButton.dataset.fill === "false") {
            fillBtnFilter(filterButton);
        }

        fetchAndRefreshProject(event);

    })

})

function emptyBtnFilter(filterButton)
{
    let clip = filterButton.closest('[data-filter]').querySelector('[data-clip');
    let circle = filterButton.closest('[data-filter]').querySelector('[data-circle]');

    clip.style.clipPath = "polygon(0 0, 19% 100%, 0 100%, 0 0)";
    filterButton.closest('[data-filter]').style.pointerEvents = 'all';

    setTimeout(() => {
        filterButton.style.color = "#871414";
    }, 200);
    circle.style.top = "8px";

    filterButton.dataset.fill = "false";
}

function fillBtnFilter(filterButton) 
{
    let clip = filterButton.closest('[data-filter]').querySelector('[data-clip');
    let circle = filterButton.closest('[data-filter]').querySelector('[data-circle]');

    clip.style.clipPath = "polygon(100% 0, 100% 100%, 0 100%, 0 0)";
    filterButton.closest('[data-filter]').style.pointerEvents = 'none';
    setTimeout(() => {
        filterButton.style.color = "white";
        circle.style.top = "-30px";
    }, 200);
    filterButton.dataset.fill = "true";
}

function fetchAndRefreshProject(event)
{
    let categoryId = event.target.dataset.categoryId;

    fetch(`/api/projects?category=${categoryId}`)
        .then((res) => {
            if (res.ok) return res.json()
        })
        .then((res) => {
            let projectContainer = document.getElementById('js-project-container');
            let projectWrappers = document.querySelectorAll('[data-project-wrapper]');

            // We need the last project wrapper, because if the user try to filter
            // too fast, we can have multiple project wrappers at once
            let lastProjectWrapper = projectWrappers[projectWrappers.length - 1];
            let newProjectWrapper = lastProjectWrapper.cloneNode();

            // This clone node serve as a project template
            let projectTemplate = document.querySelector('[data-project]').cloneNode(true);
            deleteProject(lastProjectWrapper);
            
            let animDelay = 0.0;

            setTimeout(() => {
                res.data.forEach(projectData => {
                    let newProject = createProject(projectTemplate, projectData);
                    newProject.style.animationDelay = `${animDelay}s`;
    
                    //If we don't remove default opacity, we have a "flash" with
                    // animation-fill: forwards and animation-delay that apply
                    // opacity-0 before the slideLeftOut animation start
                    setTimeout(() => {
                        newProject.classList.remove('opacity-0');
                    }, 500);
    
                    animDelay += 0.150;
                    newProjectWrapper.appendChild(newProject);
                });
                projectContainer.appendChild(newProjectWrapper);
                setHeightToAbsoluteProjectContainer(newProjectWrapper, lastProjectWrapper);
            }, 300);
            
        })
        .catch()
    }

function createProject(originalProjectTemplate, projectData)
{
    let project = originalProjectTemplate.cloneNode(true);
        
    // Populate link on image. If empty, remove href attribute
    let imgContainer = getProjectElement(project, 'img-container');
    if (projectData.project_link) {
        imgContainer.href = projectData.project_link;
    }
    else if (projectData.source_link) {
        imgContainer.href = projectData.source_link;
    }
    else {
        imgContainer.removeAttribute("href");
    }

    // Populate image url
    let img = getProjectElement(project, 'img');
    img.src = projectData.url_image;
    
    // Populate title
    let title = getProjectElement(project, 'title');
    title.textContent = projectData.title;

    // Populate description
    let description = getProjectElement(project, 'description');
    description.replaceChildren();

    description.innerHTML = projectData.description;
    
    // Populate tools icons
    let toolContainer = getProjectElement(project, 'tools');
    toolContainer.replaceChildren();
    projectData.tools.forEach(tool => {
        let icon = document.createElement('i');
        let iconClass = tool.icon.split(' ');
        icon.classList.add([...iconClass], 'text-2xl');
        toolContainer.appendChild(icon);
    });

    // Populate link CTA 'see project' and 'see source code'
    let fillBtn = createFillBtn();
    let wireframeBtn = createWireframeBtn();
    let disableFillBtn = createDisableFillBtn();
    let disableWireframeBtn = createDisableWireframeBtn();

    let projectLinkCTAContainer = getProjectElement(project, 'link');
    projectLinkCTAContainer.replaceChildren();

    if (projectData.project_link) projectLinkCTAContainer.appendChild(fillBtn);
    else projectLinkCTAContainer.appendChild(disableFillBtn);

    if (projectData.source_link) projectLinkCTAContainer.appendChild(wireframeBtn);
    else projectLinkCTAContainer.appendChild(disableWireframeBtn);

    project.classList.add('animate-slideRightIn', 'opacity-0');
    project.style.animationFillMode = 'forwards';
    return project;
}

function getProjectElement(project, element)
{
    return project.closest('[data-project]').querySelector(`[data-project-${element}]`);
}

function createFillBtn()
{
    let fillBtn = document.createElement('a');
    fillBtn.classList.add('relative', 'justify-center', 'py-5', 'px-11', 'rounded-full', 
    'text-base', 'uppercase', 'flex', 'items-center', 'group/link', 'bg-main', 'text-white');
    
    let circle = document.createElement('i');
    circle.classList.add('fa-solid', 'fa-circle', 'absolute', 'text-[0]', 
    'group-hover/link:text-xs', 'transition-all', 'duration-700', 'ease-out', 'left-7');
    
    let content = document.createElement('div');
    content.classList.add('group-hover/link:translate-x-3', 'transition-transform', 
    'duration-700', 'ease-out', 'whitespace-nowrap');
    content.textContent = 'voir le projet';
    
    fillBtn.appendChild(circle);
    fillBtn.appendChild(content);
    return fillBtn;
}

function createWireframeBtn()
{
    let wireframeBtn = document.createElement('a');
    wireframeBtn.classList.add('relative', 'justify-center', 'py-5', 'px-11', 'rounded-full', 
    'text-base', 'uppercase', 'flex', 'items-center', 'group/link', 'bg-white',
    'text-main', 'border-2', 'border-main',);
    
    let circle = document.createElement('i');
    circle.classList.add('fa-solid', 'fa-circle', 'absolute', 'text-[0]', 
    'group-hover/link:text-xs', 'transition-all', 'duration-700', 'ease-out', 'left-7');

    let content = document.createElement('div');
    content.classList.add('group-hover/link:translate-x-3', 'transition-transform',
    'duration-700', 'ease-out', 'whitespace-nowrap');
    content.textContent = 'voir le code source';
    
    wireframeBtn.appendChild(circle);
    wireframeBtn.appendChild(content);
    return wireframeBtn;
}

function createDisableFillBtn()
{
    let disableFillBtn = document.createElement('div');
    disableFillBtn.classList.add('relative', 'py-5', 'px-11', 'rounded-full', 
    'justify-center', 'text-base', 'uppercase', 'flex', 'items-center', 
    'cursor-not-allowed', 'text-white', 'bg-gray-500');

    let content = document.createElement('div');
    content.classList.add('whitespace-nowrap');
    content.textContent = 'voir le projet';

    disableFillBtn.appendChild(content);
    return disableFillBtn;
}

function createDisableWireframeBtn()
{
    let disableWireframeBtn = document.createElement('div');
    disableWireframeBtn.classList.add('relative', 'py-5', 'px-11', 'rounded-full',
     'justify-center', 'text-base','uppercase', 'flex', 'items-center', 
     'cursor-not-allowed', 'bg-white','text-gray-500', 'border-2', 'border-gray-500');

    let content = document.createElement('div');
    content.classList.add('whitespace-nowrap');
    content.textContent = 'voir le code source';

    disableWireframeBtn.appendChild(content);
    return disableWireframeBtn;
}

function deleteProject(projectWrapper)
{
    let projects = projectWrapper.children;
    let deleteDelay = 500;

    for(let i = 0; i < projects.length; i++) {
        let project =  projects[i];

        project.classList.remove('animate-slideRightIn');
        project.classList.add('animate-slideLeftOut');

        setTimeout(() => {
            project.remove();
        }, deleteDelay);

    }

    // Delete the old project wrapper container
    setTimeout(() => {
        projectWrapper.remove();
    }, 1000);

}

function setHeightToAbsoluteProjectContainer(projectWrapper, oldProjectWrapper = null)
{
    let height = projectWrapper.offsetHeight;
    let mainProjectContainer = document.getElementById('js-project-container');

    if (!oldProjectWrapper) {
        mainProjectContainer.style.height = height + 'px';
    }
    else {
        let oldHeight = oldProjectWrapper.offsetHeight;

        if (height < oldHeight) {
            setTimeout(() => {
                mainProjectContainer.style.height = height + 'px';
            }, 1000);
        }
        else mainProjectContainer.style.height = height + 'px';
    }

}