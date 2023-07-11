let filterClip = document.getElementById('js-filter-clip');
let filterBtn = document.getElementById('js-filter-btn');
let parentClip = document.getElementById('js-parent-clip');

filterBtn.addEventListener('click', (e) => {
    filterClip.style.clipPath = "polygon(100% 0, 100% 100%, 0 100%, 0 0)"
});