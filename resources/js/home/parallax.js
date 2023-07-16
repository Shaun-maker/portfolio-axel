let parallaxes = document.querySelectorAll('[data-parallax]');

// Set default value if data-attribute is not set

parallaxes.forEach((parallax) => {

    parallax.speed = parseFloat(parallax.dataset.speed) || 0.3;
    parallax.ease = parseFloat(parallax.dataset.ease) || 0.002;
    parallax.endY = parseInt(parallax.dataset.endY) || 600;
    parallax.direction = parallax.dataset.direction === "up" ? "-" : "";
    parallax.defer = parseInt(parallax.dataset.defer) || 0;
    parallax.request = null;
    parallax.pos = 0;
    parallax.requestId = null;

});

const onLoad = function() {
    document.addEventListener('scroll', onScroll);
}

window.addEventListener('load', onLoad);

const onScroll = function() {
    parallaxes.forEach((parallax) => {
        parallax.request++;
        parallax.requestId = requestAnimationFrame(() => {
            updateParallax(parallax);
        })
    });
}

function updateParallax(parallax) {
        
    let scrollY = window.scrollY * parallax.speed;

    if (window.scrollY > parallax.endY) {
        scrollY = parallax.endY;
        parallax.request = 0;
        return;
    }
    
    parallax.pos += (scrollY - parallax.pos - parallax.defer) * parallax.ease;

    if (Math.abs((scrollY - parallax.pos) - parallax.defer) < 1) {
        parallax.pos = scrollY - parallax.defer;
        parallax.request = 0;
        return;
    }

    parallax.style.transform = `translateY(${parallax.direction}${parallax.pos}px)`;

    if (parallax.request > 0) {
        parallax.requestId = requestAnimationFrame(() => {
            updateParallax(parallax);
        })
    }

}
