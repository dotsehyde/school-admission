function previewImage() {
    let img = document.getElementById("uploadPreview");
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

    oFReader.onload = function (oFREvent) {
        img.style.display = "block";
        img.src = oFREvent.target.result;
    };
}
