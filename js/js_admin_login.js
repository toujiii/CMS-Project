document.getElementById("submit").addEventListener("click", function (event) {
    var inputField1 = document.getElementById("email");
    var inputField2 = document.getElementById("password");

    if (inputField1.value.trim() === '' || inputField2.value.trim() === '') {
        event.preventDefault();
        alert("Please fill in all fields.");
        console.log("click");
    }
    else {
        const form = document.getElementById('form-con');
        const formData = new FormData(form);
        const formValues = {};

        formData.forEach((value, key) => {
            formValues[key] = value;
        });

        console.log(formValues);
        $.ajax({
            method: 'POST',
            url: '../controllers/fetchLogin.php',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (response) {
                var error_meg = document.getElementById("error-meg");
                error_meg.innerHTML = response;
            },
            error: function () {
                console.log("meron");
                window.location.href = "../webpages/admin-dashboard.php";
            }

        });
    }
});