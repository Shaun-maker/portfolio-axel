let scroller = {
    target: document.getElementById('js-smooth-scroll'),
    ease: 0.05,
    endY: 0,
    y: 0,
    scrollRequest: 0,
}

const onScroll = function() {
    for (let i = 0; i < 10; i++)
    {
        let scrollY = window.scrollY;

        console.log("scrollY : " + scrollY);
    
        scroller.endY = scrollY;
        
        scroller.y += (scrollY - scroller.y) * scroller.ease;
    
        if (Math.abs(scrollY - scroller.y) < 0.05) {
            scroller.y = scrollY;
            scroller.scrollRequest = 0;
          }
    
        console.log("scroller.y : " + scroller.y);
    }

}

window.addEventListener('scroll', onScroll);