let scroller = {
    target: document.getElementById('js-smooth-scroll'),
    ease: 0.05,
    endY: 0,
    y: 0,
    scrollRequest: 0,
}

function updateScroller() {
    let scrollY = window.scrollY;

    scroller.endY = scrollY;
    
    scroller.y += (scrollY - scroller.y) * scroller.ease;

    if (Math.abs(scrollY - scroller.y) < 0.05) {
        scroller.y = scrollY;
        scroller.scrollRequest = 0;
        }

    console.log("scroller.y : " + scroller.y);

    scroller.target.style.transform = `translateY(-${scroller.y}px)`

    requestAnimationFrame(updateScroller);
}

updateScroller();

const onScroll = function() {
    requestAnimationFrame(updateScroller);
}

window.addEventListener('scroll', onScroll);