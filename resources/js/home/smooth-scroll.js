import Lenis from 'lenis';

const lenis = new Lenis({
    // duration: 2,
});

function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
}

requestAnimationFrame(raf);

