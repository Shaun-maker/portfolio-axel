const onLoad = function() {
    splitText();
}

window.addEventListener('load', onLoad);

function splitText() {
    const splitText = document.getElementById("js-split-text");
    const splitTextContent = splitText.textContent.trim();

    const chars = splitTextContent.split(' ');

    splitText.textContent = "";
    let animationDelay = 0;
    chars.forEach((char, index) => {
        const parentSpan = document.createElement("span");
        const childSpan = document.createElement("span");

        parentSpan.classList.add('overflow-hidden');
        childSpan.style.transform = "translate(0, 90%)";

        setTimeout(() => {
            splitText.style.visibility = "visible";
            childSpan.classList.add('animate-splitText', 'block');
        }, 300);
        
        childSpan.style.animationFillMode = "forwards";
        childSpan.style.animationDelay = `${animationDelay}s`;
        animationDelay += 0.18;

        childSpan.textContent = char;
        parentSpan.append(childSpan);
        splitText.append(parentSpan);
    });
}
