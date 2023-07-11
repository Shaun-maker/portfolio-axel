let filterButtons = document.querySelectorAll('[data-filter-button]');

filterButtons.forEach((filterButton) => {

    if(filterButton.dataset.fill === 'true') {
        enableBtnFilter(filterButton);
    }

    filterButton.addEventListener('click', (e) => {
        filterButtons.forEach((filterButton) => {
            if (filterButton.dataset.fill === "true") {
                disableBtnFilter(filterButton);
            }
        })
    })

    filterButton.addEventListener('click', () => {

        if (filterButton.dataset.fill === "false") {
            enableBtnFilter(filterButton);
        }

    })

})

function disableBtnFilter(filterButton)
{
    let clip = filterButton.closest('[data-filter]').querySelector('[data-clip');
    let circle = filterButton.closest('[data-filter]').querySelector('[data-circle]');

    clip.style.clipPath = "polygon(0 0, 19% 100%, 0 100%, 0 0)";
    setTimeout(() => {
        filterButton.style.color = "#871414";
    }, 200);
    circle.style.top = "8px";

    filterButton.dataset.fill = "false";
}

function enableBtnFilter(filterButton) {
    let clip = filterButton.closest('[data-filter]').querySelector('[data-clip');
    let circle = filterButton.closest('[data-filter]').querySelector('[data-circle]');

    clip.style.clipPath = "polygon(100% 0, 100% 100%, 0 100%, 0 0)";
    setTimeout(() => {
        filterButton.style.color = "white";
        circle.style.top = "-30px";
    }, 200);
    filterButton.dataset.fill = "true";
}