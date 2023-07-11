/* let filterClip = document.getElementById('js-filter-clip');
let filterBtn = document.getElementById('js-filter-btn');
let circle = document.getElementById('js-circle'); */

let filterButtons = document.querySelectorAll('[data-filter-button]');


filterButtons.forEach((filterButton) => {

    filterButton.addEventListener('click', (e) => {
        filterButtons.forEach((filterButton) => {
            if (filterButton.dataset.fill === "true") {
                let clip = filterButton.closest('[data-filter]').querySelector('[data-clip');
                let circle = filterButton.closest('[data-filter]').querySelector('[data-circle]');

                clip.style.clipPath = "polygon(0 0, 19% 100%, 0 100%, 0 0)";
                setTimeout(() => {
                    filterButton.style.color = "#871414";
                }, 200);
                circle.style.top = "8px";
        
                filterButton.dataset.fill = "false";
            }
        })
    })

    filterButton.addEventListener('click', () => {

        let clip = filterButton.closest('[data-filter]').querySelector('[data-clip');
        let circle = filterButton.closest('[data-filter]').querySelector('[data-circle]');

        if (filterButton.dataset.fill === "false") {
            clip.style.clipPath = "polygon(100% 0, 100% 100%, 0 100%, 0 0)";
            setTimeout(() => {
                filterButton.style.color = "white";
                circle.style.top = "-30px";
            }, 200);
            filterButton.dataset.fill = "true";
        }

    })

})

/* let testBtn = document.getElementById('js-test-btn'); */

/* let fill = false;

testBtn.addEventListener('click', (e) => {
    if (!fill) {
        filterClip.style.clipPath = "polygon(100% 0, 100% 100%, 0 100%, 0 0)";
        setTimeout(() => {
            filterBtn.style.color = "white";
            circle.style.top = "-30px";
        }, 200);
        fill = true;
    }
    else {
        filterClip.style.clipPath = "polygon(0 0, 19% 100%, 0 100%, 0 0)";
        setTimeout(() => {
            filterBtn.style.color = "#871414";
        }, 200);
        circle.style.top = "8px";

        fill = false;
    }
});

filterBtn.addEventListener('click', (e) => {
    filterClip.style.clipPath = "polygon(100% 0, 100% 100%, 0 100%, 0 0)";

}); */