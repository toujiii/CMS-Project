var search = document.getElementById('search');
var outsideClickHandled = false;
function searching() {
    outsideClickHandled = false;
    // console.log("pressed");
    var getName = search.value;
    console.log("serach: " + getName);
    if (getName.trim() !== '') {
        console.log("may laman");
        $.ajax({
            method: 'POST',
            url: '../controllers/fetchSearchResults.php',
            data: {
                name: getName
            },
            success: function(response) {
                $('#search-result').html(response);
            }
        });
        $('#search-result').css('padding', '10px 0px');
    } else {
        $(search).val('');
        $('#search-result').html(''); 
        $('#search-result').css('padding', '0px 0px');
    }

}


$(document).on('click', function (event) {
    if (!outsideClickHandled && !$(search).is(event.target)) {
        $(search).html('');
        $(search).val('');
        $('#search-result').html(''); 
        $('#search-result').css('padding', '0px 0px');
        outsideClickHandled = true;
    }
});

