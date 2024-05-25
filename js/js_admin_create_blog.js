let confirm_pup = document.getElementById('confirmPup');
let confirm_pup_box = document.getElementById('confirmPupBox');

function openConfirmPup() {
    confirm_pup.style.visibility = "visible";
    confirm_pup_box.style.scale = "100%";
    confirm_pup.style.opacity = "1";
}

function closeConfirmPup() {

    confirm_pup_box.style.scale = "30%";
    confirm_pup.style.opacity = "0";
    setTimeout(function () {
        confirm_pup.style.visibility = "hidden";
    }, 200);
}

let continued_pup = document.getElementById('continuedPup');
let continued_pup_box = document.getElementById('continuedPupBox');

function openContinuedPup() {
    continued_pup.style.visibility = "visible";
    continued_pup_box.style.scale = "100%";
    continued_pup.style.opacity = "1";
}

document.getElementById("submit").addEventListener("click", function (event) {
    var inputField1 = document.getElementById("title");
    var inputField2 = document.getElementById("publisher");
    var inputField3 = document.getElementById("file-upload");
    var inputField4 = tinymce.get("blog-textarea").getContent();

    if (inputField1.value.trim() === '' || inputField2.value.trim() === '' || !inputField3.files[0] || inputField4.trim() === '') {
        event.preventDefault();
        alert("Please fill in all fields.");
    } else openConfirmPup();
});


document.getElementById("continue").addEventListener("click", function () {
    var textareaValue = tinymce.get("blog-textarea").getContent();

    var textarea = document.createElement("textarea");
    textarea.id = "blog-textarea";
    textarea.name = "content";
    textarea.value = textareaValue;
    textarea.style.display = "none";

    document.getElementById("blog-form").appendChild(textarea);

    document.getElementById("blog-form").submit();

});

document.getElementById("continued").addEventListener("click", function () {
    $.ajax({
        method: 'POST',
        url: '../controllers/removeSessionAdd.php',
        success: function(response) {
            console.log('Request was successful:', response);
            window.location.href = "admin-dashboard.php";
        },
    });
   
});


// checks if the blog is recorded
var recordedScript = document.getElementById("recorded-value");
var recorded = recordedScript.getAttribute("data-recorded");
recorded = (recorded === "true");
console.log(recorded);
if (recorded) {
    openContinuedPup();
}
