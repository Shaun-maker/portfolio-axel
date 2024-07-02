import Lenis from 'lenis';

const lenis = new Lenis({
    lerp: 0.08,
});

function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
}

requestAnimationFrame(raf);

