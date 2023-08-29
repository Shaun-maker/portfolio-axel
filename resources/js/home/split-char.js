let textDomElement = document.getElementById('js-split-char');
textDomElement.style.visibility = "hidden";

const onLoad = function() {
    let lettersDomElement = splitChar(textDomElement);

    const triggerAnimation = function(entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            textDomElement.textContent = "";
            textDomElement.style.visibility = "visible";
            lettersDomElement.forEach((letter) => {
                textDomElement.append(letter);
            });
            observer.unobserve(textDomElement);
        }
    });
}

let options = {
    root: document.getElementById('js-viewport'),
    rootMargin: "0px",
    threshold: 1.0,
};

let observer = new IntersectionObserver(triggerAnimation, options);
observer.observe(textDomElement);
}

window.addEventListener('load', onLoad);

function splitChar(textDomElement) {
    const text = textDomElement.textContent.trim();
    const chars = text.split('');

    const lettersDomElement = initLetters(chars);

    return lettersDomElement;
}

function initLetters(chars) {
    const lettersDomElement = [];
    let animationDelay = 0;

    chars.forEach((char) => {
        if (char === ' ') char = '&nbsp';
        const parentSpan = document.createElement('span');
        const childSpan = document.createElement('span');

        parentSpan.classList.add('overflow-hidden');
        childSpan.classList.add('block', 'animate-splitChar');
        childSpan.style.transform = "translate(0, 90%)";
        childSpan.style.animationFillMode = "forwards";
        childSpan.style.animationDelay = `${animationDelay}s`;
        childSpan.innerHTML = char;

        parentSpan.append(childSpan);

        lettersDomElement.push(parentSpan);

        animationDelay += 0.08;
    });

    return lettersDomElement;
}
