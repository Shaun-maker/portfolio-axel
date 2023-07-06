let parallax = {
    speed: 0.002,
    y: 0,
    parallaxRequest: 0,
    target: document.querySelectorAll('[data-parallax]'),
    endY: 550,
}

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
        let scrollY = window.scrollY * 0.3;

        if (scrollY > parallax.endY) scrollY = parallax.endY;
        
        parallax.y += (scrollY - parallax.y) * parallax.speed;
        console.log(Math.abs(scrollY - parallax.y));
        if (Math.abs(scrollY - parallax.y) < 0.05) {
            parallax.y = scrollY;
            parallax.parallaxRequest = 0;
        }    
        parallaxElt.style.transform = `translateY(${parallax.y}px)`
    });
    requestId = parallax.parallaxRequest > 0 ? 
    requestAnimationFrame(updateParallax) : null;
}



document.querySelectorAll('[data-parallax]').forEach((parallaxElt) => {
    //console.log(parallaxElt);
})