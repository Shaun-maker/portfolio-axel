let parallax = {
    target: document.querySelectorAll('[data-parallax]'),
}

// Set default value if data-attribute is not set

parallax.target.forEach((parallaxElt) => {

    parallaxElt.speed = parseInt(parallaxElt.dataset.speed) || 0.3;
    parallaxElt.ease = parseInt(parallaxElt.dataset.ease) || 0.002;
    parallaxElt.endY = parseInt(parallaxElt.dataset.endY) || 600;
    parallaxElt.direction = parallaxElt.dataset.direction === "up" ? "-" : "";
    parallaxElt.defer = parseInt(parallaxElt.dataset.defer) || 0;
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

    if (Math.abs((scrollY - parallaxElt.pos) - parallaxElt.defer) < 0.05) {
        parallaxElt.pos = scrollY + parallaxElt.defer;
        parallaxElt.request = 0;
        return;
    }

    console.log(Math.abs((scrollY - parallaxElt.pos) - parallaxElt.defer));
    //console.log(scrollY);

    parallaxElt.style.transform = `translateY(${parallaxElt.direction}${parallaxElt.pos}px)`

    if (parallaxElt.request > 0) {
        parallaxElt.requestId = requestAnimationFrame(() => {
            updateParallax(parallaxElt);
        })
    }

}
