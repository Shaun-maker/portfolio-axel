
let presentationImg = document.getElementById('presentation-image');
let projectImg = document.getElementById('project-image');

const onChange = function (event) {
    let thumbnail = event.target.closest('[data-modal]').querySelector('[data-thumbnail-img]');
    let inputFile = event.target.files[0];
    updateThumbnail(inputFile, thumbnail);
}

presentationImg.addEventListener('change', onChange);
projectImg.addEventListener('change', onChange);

function updateThumbnail(inputFile, thumbnail)
{
    const reader = new FileReader();
    reader.onload = (e) => {thumbnail.src = e.target.result};
    reader.readAsDataURL(inputFile);
}