let parallax = {
    parallaxRequest: 0,
    target: document.querySelectorAll('[data-parallax]'),
}

// Set default value if data-attribute is not set

parallax.target.forEach((parallaxElt) => {

    parallaxElt.speed = parallaxElt.dataset.speed || 0.3;
    parallaxElt.ease = parallaxElt.dataset.ease || 0.002;
    parallaxElt.endY = parallaxElt.dataset.endY || 600;
    parallaxElt.direction = parallaxElt.dataset.direction === "up" ? "-" : "";
    parallaxElt.defer = parallaxElt.dataset.defer || 0;
    parallaxElt.pos = 0;

});

var requestId = null;

const onLoad = function() {
    document.addEventListener('scroll', onScroll);
}

window.addEventListener('load', onLoad);

const onScroll = function() {
    parallax.parallaxRequest++;
    requestId = requestAnimationFrame(updateParallax);
}

function updateParallax() {
    parallax.target.forEach((parallaxElt) => {
        
        let scrollY = window.scrollY * parallaxElt.speed;

        if (scrollY > parallaxElt.endY) scrollY = parallaxElt.endY;
        
        parallaxElt.pos += (scrollY - parallaxElt.pos - parallaxElt.defer) * parallaxElt.ease;

        if (Math.abs(scrollY - parallaxElt.pos) < 0.05) {
            parallaxElt.pos = scrollY;
            parallax.parallaxRequest = 0;
        }

        console.log(scrollY);

        parallaxElt.style.transform = `translateY(${parallaxElt.direction}${parallaxElt.pos}px)`

    });

    requestId = parallax.parallaxRequest > 0 ? 
    requestAnimationFrame(updateParallax) : null;
}
