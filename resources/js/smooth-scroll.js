let body = document.body;
var setScrollValue = false;

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
      let height = scroller.target.clientHeight;
      body.style.height = height + "px";
      scroller.resizeRequest = 0;
    }
    //let scrollY = window.scrollY;
    let scrollY;
    if (!setScrollValue) {
        scrollY = window.scrollY;
    } else {
        scrollY = setScrollValue;
    }

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

const onScroll = function() {
    setScrollValue = false;
    scroller.scrollRequest++;
    requestId = requestAnimationFrame(updateScroller);
}

const onResize = function() {
    scroller.resizeRequest++;
    requestId = requestAnimationFrame(updateScroller);
}

document.querySelectorAll('[data-navlink]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();

      console.log(e.target.href);

        setScrollValue = 1400;
        scroller.scrollRequest++;
        document.getElementById('js-header').style.transform = "translate(0, -100%)"
        requestId = requestAnimationFrame(updateScroller);
    });
  });