const onLoad = function() {
    splitText();
}

window.addEventListener('load', onLoad);

function splitText() {
    const splitText = document.getElementById("js-split-text");
    splitText.style.visibility = "visible";
    const splitTextContent = splitText.textContent.trim();

    const chars = splitTextContent.split(' ');

    splitText.textContent = "";
    let animationDelay = 0;
    chars.forEach((char, index) => {
        const parentSpan = document.createElement("span");
        const childSpan = document.createElement("span");

        parentSpan.classList.add('overflow-hidden');
        childSpan.classList.add('animate-splitText', 'block');
        childSpan.style.transform = "translate(0, 90%)";
        childSpan.style.animationFillMode = "forwards";
        childSpan.style.animationDelay = `${animationDelay}s`;
        animationDelay += 0.15;

        childSpan.textContent = char;
        parentSpan.append(childSpan);
        splitText.append(parentSpan);
});
}
