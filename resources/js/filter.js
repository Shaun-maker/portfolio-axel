let filterClip = document.getElementById('js-filter-clip');
let filterBtn = document.getElementById('js-filter-btn');
let circle = document.getElementById('js-circle');

let testBtn = document.getElementById('js-test-btn');

let fill = false;

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

});