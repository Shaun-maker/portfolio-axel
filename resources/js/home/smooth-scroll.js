let body = document.body;

const EASE_SLOW = 0.003;
const EASE_SPEED = 0.020;

let scrollPosition = {
    project: 1508,
    contact: 9999,
}

let scroller = {
    target: document.getElementById('js-smooth-scroll'),
    ease: EASE_SLOW,
    endY: 0,
    y: 0,
    scrollRequest: 0,
    resizeRequest: 1,
}

var requestId = null;

window.addEventListener('load', onLoad);

function onLoad() {
    if (!mobileDevice()) {
        updateScroller();
        window.focus();
        document.addEventListener('scroll', onScroll);
        window.addEventListener('resize', onResize);
    }
}

function updateScroller() {
    let resized = scroller.resizeRequest > 0;
    
    if (resized) {    
      let height = scroller.target.clientHeight;
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

const onScroll = function() {
    scroller.scrollRequest++;
    requestId = requestAnimationFrame(updateScroller);
}

const onResize = function() {
    scroller.resizeRequest++;
    requestId = requestAnimationFrame(updateScroller);
}

/* Smooth scroll for anchor tag on Navmenu */

document.querySelectorAll('[data-navlink]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        let target = e.target.dataset.navlink;

        // We want to increase scroll speed only for anchor tag, and set it to
        // default slow ease after.
        scroller.ease = EASE_SPEED;
        setTimeout(() => {
            scroller.ease = EASE_SLOW;
        }, 2000);

        scroller.scrollRequest++;

        // Hide header when scroll down to target
        document.getElementById('js-header').style.transform = "translate(0, -100%)"
        
        requestId = requestAnimationFrame(updateScroller);

        window.scrollTo({
            top: scrollPosition[target],
        });
    });
  });

/* We want to disable smooth-scroll for mobile device, has it make the website laggy */
function mobileDevice()
{
    if (window.screen.width < 1280) {
        document.getElementById('js-viewport').classList.remove('fixed');
        return true;
    }
}