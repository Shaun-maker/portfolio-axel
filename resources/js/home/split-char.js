let textDomElement = document.getElementById('js-split-char');

const onLoad = function() {
    splitChar(textDomElement);
}

window.addEventListener('load', onLoad);

function splitChar(textDomElement) {
    const text = textDomElement.textContent.trim();
    const chars = text.split('');
    console.log(chars);

    const lettersDomElement = initLetters(chars);

    textDomElement.textContent = "";

    lettersDomElement.forEach((letter) => {
        textDomElement.append(letter);
    });
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
