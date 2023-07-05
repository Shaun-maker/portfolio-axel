let header = {
    target: document.getElementById('js-header'),
    y: 0,
    preventTrigger: false,
    hide: false
}

window.addEventListener('load', onLoad);

function onLoad() {
    document.addEventListener('scroll', onScroll);
}

function onScroll() {
    let scrollY = window.scrollY;

    scrollY > 55 ? header.hide = true : header.hide = false;


    if (!header.preventTrigger) {

        if (scrollY > header.y && header.hide) {
            header.target.style.transform = "translate(0, -100%)"
        } else {
            header.target.style.transform = "translate(0, 0)"
        }
        
        header.preventTrigger = true;

        setTimeout(() => {
            header.preventTrigger = false;
        }, 300)
    }
    header.y = scrollY;

    if (header.y != scrollY) {
        onScroll();
    }
}