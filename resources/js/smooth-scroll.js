let body = document.body;

let scroller = {
    target: document.getElementById('js-smooth-scroll'),
    ease: 0.005,
    endY: 0,
    y: 0,
    scrollRequest: 0,
}

var requestId = null;

let height = scroller.target.clientHeight;
body.style.height = height + "px";

window.addEventListener('load', onLoad);

function onLoad() {
    updateScroller();
    window.focus();
    window.addEventListener('scroll', onScroll);
}

function updateScroller() {
    let scrollY = window.scrollY;

    scroller.endY = scrollY;
    
    scroller.y += (scrollY - scroller.y) * scroller.ease;
    console.log(scroller.y);

    if (Math.abs(scrollY - scroller.y) < 0.5) {
        scroller.y = scrollY;
        scroller.scrollRequest = 0;
        }

    scroller.target.style.transform = `translateY(-${scroller.y}px)`

    requestId = scroller.scrollRequest > 0 ? 
    requestAnimationFrame(updateScroller) : null;
}

updateScroller();

const onScroll = function() {
    scroller.scrollRequest++;
    requestId = requestAnimationFrame(updateScroller);
}

