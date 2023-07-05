let body = document.body;

let scroller = {
    target: document.getElementById('js-smooth-scroll'),
    ease: 0.003,
    endY: 0,
    y: 0,
    scrollRequest: 0,
    resizeRequest: 1,
}

var requestId = null;

window.addEventListener('load', onLoad);

function onLoad() {
    updateScroller();
    window.focus();
    document.addEventListener('scroll', onScroll);
    window.addEventListener('resize', onResize);

}

function updateScroller() {
    let resized = scroller.resizeRequest > 0;
    
    if (resized) {    
      var height = scroller.target.clientHeight;
      body.style.height = height + "px";
      scroller.resizeRequest = 0;
    }
    let scrollY = window.scrollY;

    scroller.endY = scrollY;
    
    scroller.y += (scrollY - scroller.y) * scroller.ease;

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

const onResize = function() {
    scroller.resizeRequest++;
    requestId = requestAnimationFrame(updateScroller);
}

