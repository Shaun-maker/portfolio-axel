let header = {
    target: document.getElementById('js-header'),
    y: 0,
    preventTrigger: false,
    hide: false,
    valueAtFirstContent: 120,
}

window.addEventListener('load', onLoad);

function onLoad() {
    document.addEventListener('scroll', onScroll);
}

function onScroll() {
    let scrollY = window.scrollY;

    // If header did not reach first content, don't hide it
    scrollY > header.valueAtFirstContent ? header.hide = true : header.hide = false;

    // preventTrigger is because scroll event is fired at high rate,
    // we don't need to check that much if we can hide or show header and we want to save some CPU
    if (!header.preventTrigger) {

        if (scrollY > header.y && header.hide) {
            header.target.style.transform = "translate(0, -100%)"
        } else {
            header.target.style.transform = "translate(0, 0)"
        }
        
        header.preventTrigger = true;

        setTimeout(() => {
            header.preventTrigger = false;
        }, 100)
    }
    header.y = scrollY;
}