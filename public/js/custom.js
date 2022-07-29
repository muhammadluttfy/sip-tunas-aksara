// avatarPreview
function previewAvatar() {
    const avatar = document.querySelector("#avatar");
    const avatarPreview = document.querySelector(".avatar-preview");
    // avatarPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(avatar.files[0]);
    oFReader.onload = function (oFREvent) {
        avatarPreview.src = oFREvent.target.result;
    };
}
