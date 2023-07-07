let parallax = {
    target: document.querySelectorAll('[data-parallax]'),
}

// Set default value if data-attribute is not set

parallax.target.forEach((parallaxElt) => {

    parallaxElt.speed = parallaxElt.dataset.speed || 0.3;
    parallaxElt.ease = parallaxElt.dataset.ease || 0.002;
    parallaxElt.endY = parallaxElt.dataset.endY || 600;
    parallaxElt.direction = parallaxElt.dataset.direction === "up" ? "-" : "";
    parallaxElt.defer = parallaxElt.dataset.defer || 0;
    parallaxElt.request = null;
    parallaxElt.pos = 0;
    parallaxElt.requestId = null;

});

var requestId = null;

const onLoad = function() {
    document.addEventListener('scroll', onScroll);
}

window.addEventListener('load', onLoad);

const onScroll = function() {
    parallax.target.forEach((parallaxElt) => {
        cancelAnimationFrame(parallaxElt.requestId); // Why ?
        parallaxElt.request++;
        parallaxElt.requestId = requestAnimationFrame(() => {
            updateParallax(parallaxElt);
        })
    });
}

function updateParallax(parallaxElt) {
        
    let scrollY = window.scrollY * parallaxElt.speed;

    if (scrollY > parallaxElt.endY) scrollY = parallaxElt.endY;
    
    parallaxElt.pos += (scrollY - parallaxElt.pos - parallaxElt.defer) * parallaxElt.ease;

    if (Math.abs(scrollY - parallaxElt.pos) < 0.05) {
        parallaxElt.pos = scrollY;
        parallaxElt.request = 0;
        return;
    }

    console.log(Math.abs(window.scrollY - parallaxElt.pos));

    parallaxElt.style.transform = `translateY(${parallaxElt.direction}${parallaxElt.pos}px)`

    if (parallaxElt.request > 0) {
        parallaxElt.requestId = requestAnimationFrame(() => {
            updateParallax(parallaxElt);
        })
    }

}
