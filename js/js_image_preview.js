
var input = document.getElementById("file-upload");
var preview = document.getElementById("imagePreview");

input.addEventListener("change", function () {
    var file = this.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function (event) {
            var img = document.createElement("img");
            img.src = event.target.result;
            preview.innerHTML = "";
            preview.appendChild(img);
        };
        reader.readAsDataURL(file);
    }
});