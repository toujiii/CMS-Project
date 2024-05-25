document.getElementById("create-blog").addEventListener("click", function () {
    $.ajax({
        method: 'POST',
        url: '../controllers/setSessionAdd.php',
        success: function(response) {
            console.log('Request was successful:', response);
        },
    });
    
});
