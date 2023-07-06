let parallax = {
    parallaxRequest: 0,
    target: document.querySelectorAll('[data-parallax]'),
}

// Set default value

parallax.target.forEach((parallaxElt) => {

    if (parallaxElt.dataset.speed) parallaxElt.speed = parallaxElt.dataset.speed;
    else parallaxElt.speed = 0.3;

    if (parallaxElt.dataset.ease) parallaxElt.ease = parallaxElt.dataset.ease;
    else parallaxElt.ease = 0.002;

    if (parallaxElt.dataset.endY) parallaxElt.endY = parallaxElt.dataset.endY;
    else parallaxElt.endY = 600;

    if (parallaxElt.dataset.direction == "up")  parallaxElt.direction = "-"
    else parallaxElt.direction = "";

    parallaxElt.pos = 0;
});

console.log(parallax.target[1].ease);

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
        
        parallaxElt.pos += (scrollY - parallaxElt.pos) * parallaxElt.ease;

        if (Math.abs(scrollY - parallaxElt.pos) < 0.05) {
            parallaxElt.pos = scrollY;
            parallax.parallaxRequest = 0;
        }

        parallaxElt.style.transform = `translateY(${parallaxElt.direction}${parallaxElt.pos}px)`

    });

    requestId = parallax.parallaxRequest > 0 ? 
    requestAnimationFrame(updateParallax) : null;
}
