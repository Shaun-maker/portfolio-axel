let filterButtons = document.querySelectorAll('[data-filter-button]');

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
            res.data.forEach(projectData => {
                console.log(projectData);
                createProject(projectData);
            });
        })
        .catch()
}

function createProject(projectData)
{
    let project = document.createElement('article');
    let imgContainer = document.createElement('a');
    let img = document.createElement('img');
    let lineBreak = document.createElement('div');
    let contentContainer = document.createElement('div');
    let title = document.createElement('h4');
    let content = document.createElement('div');
    let toolContainer = document.createElement('div');
    let ctaContainer = document.createElement('div');
    let fillBtn = document.createElement('a');
    let wireframeBtn = document.createElement('a');
    let disableFillBtn = document.createElement('div');
    let disableWireframeBtn = document.createElement('div');

    
    project.classList.add(projectClass.project);
    imgContainer.classList.add(projectClass.imgContainer);
    img.classList.add(projectClass.img);
    lineBreak.classList.add(projectClass.lineBreak);
    contentContainer.classList.add(projectClass.contentContainer);
    title.classList.add(projectClass.title);
    content.classList.add(projectClass.content);
    toolContainer.classList.add(projectClass.toolContainer);
    ctaContainer.classList.add(projectClass.ctaContainer);
    fillBtn.classList.add(projectClass.fillBtn);
    wireframeBtn.classList.add(projectClass.wireframeBtn);
}

let projectClass = {
    project: [
        'flex', 'flex-col', 'lg:flex-row', '[max-w-1400px]'
    ],
    imgContainer: [
        'group', 'bg-gray-100', 'sm:px-24', 'sm:py-12', 'px-14', 'py-8', 'basis-5/12', 
        'flex', 'justify-center', 'transition-all', 'duration-300', 
        'hover:rounded-[32px]', 'hover:bg-gray-200'
    ],
    img: [
        'opacity-40', 'object-cover', 'transition-all', 'group-hover:opacity-50',
        'duration-700', 'group-hover:scale-105'
    ],
    lineBreak: [
        'lg:w-0.5', 'lg:h-auto', 'h-0.5', 'w-full', 'bg-main', 'my-8', 'lg:my-0',
        'lg:mx-14'
    ],
    contentContainer: [
        'basis-7/12', 'flex', 'flex-col', 'justify-between', 'gap-10',
    ],
    title: [
        'sm:text-3xl', 'text-2xl', 'uppercase', 'text-center',
    ],
    content: [
        'flex', 'flex-col', 'gap-4',
    ],
    toolContainer: [
        'flex', 'justify-center', 'gap-8'
    ],
    ctaContainer: [
        'flex', 'sm:flex-row', 'flex-col', 'justify-evenly', 'gap-8', 'sm:gap-4'
    ],
    fillBtn: [
        'relative', 'justify-center', 'py-5', 'px-11', 'rounded-full', 
        'text-base', 'uppercase', 'flex', 'items-center', 'group/link', 'bg-main', 'text-white'
    ],
    wireframeBtn: [
        'relative', 'justify-center', 'py-5', 'px-11', 'rounded-full', 
        'text-base', 'uppercase', 'flex', 'items-center', 'group/link', 'bg-white',
        'text-main', 'border-2', 'border-main',
    ],
}
