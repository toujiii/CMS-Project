let confirm_edit_pup = document.getElementById('confirmEditPup');
let confirm_edit_pup_box = document.getElementById('confirmEditPupBox');

function openConfirmEditPup() {
    confirm_edit_pup.style.visibility = "visible";
    confirm_edit_pup_box.style.scale = "100%";
    confirm_edit_pup.style.opacity = "1";
}

function closeConfirmEditPup() {

    confirm_edit_pup_box.style.scale = "30%";
    confirm_edit_pup.style.opacity = "0";
    setTimeout(function () {
        confirm_edit_pup.style.visibility = "hidden";
    }, 200);
}

let continued_edit_pup = document.getElementById('continuedEditPup');
let continued_edit_pup_box = document.getElementById('continuedEditPupBox');
function openContinuedEditPup() {
    continued_edit_pup.style.visibility = "visible";
    continued_edit_pup_box.style.scale = "100%";
    continued_edit_pup.style.opacity = "1";
}

document.getElementById("submit").addEventListener("click", function (event) {
    openConfirmEditPup();
});

document.getElementById("continueEdit").addEventListener("click", function () {
    var textareaValue = tinymce.get("blog-textarea").getContent();

    var textarea = document.createElement("textarea");
    textarea.id = "blog-textarea";
    textarea.name = "content";
    textarea.value = textareaValue;
    textarea.style.display = "none";

    document.getElementById("blog-form").appendChild(textarea);

    document.getElementById("blog-form").submit();
});

document.getElementById("continuedEdit").addEventListener("click", function () {
    window.location.reload(true);
    window.location.href = "admin-dashboard.php";
});


// checks if the blog is recorded
var recordedScript = document.getElementById("recorded-value");
var recorded = recordedScript.getAttribute("data-recorded");
recorded = (recorded === "true");
console.log(recorded);
if (recorded) {
    openContinuedEditPup();
}
