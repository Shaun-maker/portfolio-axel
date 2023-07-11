let filterClip = document.getElementById('js-filter-clip');
let filterBtn = document.getElementById('js-filter-btn');
let parentClip = document.getElementById('js-parent-clip');

let width = parseInt(filterBtn.offsetWidth);
let height = parseInt(filterBtn.offsetHeight);
let borderRadius = parseInt(window.getComputedStyle(filterBtn).borderRadius);
let borderWidth = borderRadius / width;
let borderHeight = borderRadius / height;

console.log(width);
console.log(height);


let clipPathValue = `inset(0 0 0 0 round ${borderWidth}px ${borderHeight}px)`;
filterBtn.style.clipPath = clipPathValue;

filterBtn.addEventListener('click', (e) => {
    filterClip.style.clipPath = "polygon(100% 0, 100% 100%, 0 100%, 0 0)"
});