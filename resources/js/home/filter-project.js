import tooltips from './tooltip.js';
import projectTemplateRaw from '../../static/project-template.html?raw';

let body = document.body;
let filterButtons = document.querySelectorAll('[data-filter-button]');

const PERSONAL_PROJECT = 1;
const PROFESSIONNAL_PROJECT = 2;
const TRAINING_PROJECT = 3;

// Calculate the total height of project, for project container in absolute position
setHeightToAbsoluteProjectContainer(document.querySelector('[data-project-wrapper]'));

// Because projectWrapper is in absolute position, we have to compute height of
// main projectContainer on resize
window.addEventListener('resize', () => {
    let lastWrapper = getLastWrapper();
    let height = lastWrapper.offsetHeight;

    setHeightProjectContainer(height);
})

filterButtons.forEach((filterButton) => {

    filterButton.addEventListener('click', (event) => {
        fetchAndRefreshProject(event);
    })
})

function fetchAndRefreshProject(event)
{
    let categoryId = event.target.dataset.categoryId;

    fetch(`/api/projects?category=${categoryId}`)
        .then((res) => {
            if (res.ok) return res.json()
        })
        .then((res) => {
            let projectContainer = document.getElementById('js-project-container');

            let lastProjectWrapper = getLastWrapper();
            let newProjectWrapper = lastProjectWrapper.cloneNode();
            
            deleteProject(lastProjectWrapper);
            
            let animDelay = 0.0;

            // animation delay between each filter request
            setTimeout(() => {

                res.data.forEach(projectData => {

                    let projectTemplate = getDOMTemplateProject();
                    let newProject = createProject(projectTemplate, projectData);

                    // set rel='nofollow' for professionnal project
                    setRelAttribute(newProject, categoryId);
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
                tooltips();
                setHeightToAbsoluteProjectContainer(newProjectWrapper, lastProjectWrapper);

            }, 150);

        })
        .catch()
    }

function getLastWrapper()
{
    let projectWrappers = document.querySelectorAll('[data-project-wrapper]');

    // We need the last project wrapper, because if the user try to filter
    // too fast, we can have multiple project wrappers at once
    return projectWrappers[projectWrappers.length - 1];
}

function getDOMTemplateProject()
{
    let div = document.createElement('div');
    div.innerHTML = projectTemplateRaw;
    return div.querySelector('[data-project]');
}

function createProject(project, projectData)
{ 
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
    let imgWebp = getProjectElement(project, 'img-webp');
    let img = getProjectElement(project, 'img');
    imgWebp.srcset = projectData.url_image_webp;
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
        let span = document.createElement('span');
        span.dataset.tippyContent = tool.name;
        span.innerHTML = tool.icon;
        span.classList.add('text-2xl');
        toolContainer.appendChild(span);
    });

    // Populate date
    let startDate = getProjectElement(project, 'start-date');
    let endDate = getProjectElement(project, 'end-date');

    startDate.innerHTML = projectData.french_truncated_start_date;
    startDate.setAttribute('datetime', projectData.only_date_start);

    if (projectData.end_date === null) endDate.textContent = " En cours";
    else {
        endDate.innerHTML = projectData.french_truncated_end_date;
        endDate.setAttribute('datetime', projectData.only_date_end)
    }
    
    // Populate link CTA 'see project' and 'see source code'
    let fillBtn = createFillBtn();
    let wireframeBtn = createWireframeBtn();
    let disableFillBtn = createDisableFillBtn();
    let disableWireframeBtn = createDisableWireframeBtn();

    let projectLinkCTAContainer = getProjectElement(project, 'link');

    if(projectData.project_link || projectData.source_link) {
        projectLinkCTAContainer.replaceChildren();

        if (projectData.project_link) {
            projectLinkCTAContainer.appendChild(fillBtn);
            fillBtn.setAttribute('href', projectData.project_link);
            fillBtn.setAttribute('target', '_blank');
        } 
        else projectLinkCTAContainer.appendChild(disableFillBtn);
    
        if (projectData.source_link) {
            projectLinkCTAContainer.appendChild(wireframeBtn);
            wireframeBtn.setAttribute('href', projectData.source_link);
            wireframeBtn.setAttribute('target', '_blank');
        } 
        else projectLinkCTAContainer.appendChild(disableWireframeBtn);
    }
    else {
        projectLinkCTAContainer.remove();
    }

    project.classList.add('animate-slideRightIn', 'opacity-0');
    project.style.animationFillMode = 'forwards';
    return project;
}

function getProjectElement(project, element)
{
    return project.closest('[data-project]').querySelector(`[data-project-${element}]`);
}

function setRelAttribute(project, categoryId) {
    if (categoryId == PROFESSIONNAL_PROJECT) {
        let links = project.querySelectorAll('a');

        links.forEach(link => {
            link.setAttribute('rel', 'external nofollow');
        });
    }
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

function setHeightProjectContainer(height)
{
    let mainProjectContainer = document.getElementById('js-project-container');
    mainProjectContainer.style.height = height + 'px';
}

function setHeightProjectContainerAndBody(height)
{
    setHeightProjectContainer(height);
    setHeightBody();
}

function setHeightToAbsoluteProjectContainer(projectWrapper, oldProjectWrapper = null)
{
    let height = projectWrapper.offsetHeight;

    if (!oldProjectWrapper) {
        setHeightProjectContainerAndBody(height)
    }
    else {
        let height = projectWrapper.offsetHeight;
        setHeightProjectContainerAndBody(height);
    }
}

function setHeightBody()
{
    let height = document.getElementById('js-smooth-scroll').clientHeight;
    body.style.height = height + "px";
}