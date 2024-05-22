var search = document.getElementById('search');
var menu_search = document.getElementById('menu-search');
var head_search = document.getElementById('head-search');

var outsideClickHandled = false;
var outsideHeadClickHandled = false;
var outsideMenuClickHandled = false;
function searching(searchtype) {
    if (searchtype == 'top-search') {
        var getName = search.value;
        outsideClickHandled = false;
    }
    else if (searchtype == 'head-search') {
        var getName = head_search.value;
        outsideHeadClickHandled = false;
    } 
    else if (searchtype == 'menu-search') {
        var getName = menu_search.value;
        outsideMenuClickHandled = false;
    }

    // console.log("pressed");

    console.log("serach: " + getName);
    if (getName.trim() !== '') {
        console.log("may laman");
        $.ajax({
            method: 'POST',
            url: '../controllers/fetchSearchResults.php',
            data: {
                name: getName
            },
            success: function (response) {
                if (searchtype == 'top-search') {
                    $('#search-result').html(response);
                }
                else if (searchtype == 'head-search') {
                    $('#head-search-result').html(response);
                } 
                else if (searchtype == 'menu-search') {
                    $('#menu-search-result').html(response);
                }
            }
        });
        if (searchtype == 'top-search') {
            $('#search-result').css('padding', '10px 0px');
        }
        else if (searchtype == 'head-search') {
            $('#head-search-result').css('padding', '10px 0px');
        }
        else if (searchtype =='menu-search') {
            $('#menu-search-result').css('padding', '10px 0px');
        }
    } else {
        if (searchtype == 'top-search') {
            $(search).val('');
            $('#search-result').html('');
            $('#search-result').css('padding', '0px 0px');
        }
        else if (searchtype == 'head-search') {
            $(head_search).val('');
            $('#head-search-result').html('');
            $('#head-search-result').css('padding', '0px 0px');
        }
        else if (searchtype =='menu-search') {
            $(menu_search).val('');
            $('#menu-search-result').html('');
            $('#menu-search-result').css('padding', '0px 0px');
        }

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

$(document).on('click', function (event) {
    if (!outsideHeadClickHandled && !$(head_search).is(event.target)) {
        $(head_search).html('');
        $(head_search).val('');
        $('#head-search-result').html('');
        $('#head-search-result').css('padding', '0px 0px');
        outsideHeadClickHandled = true;
    }
});

$(document).on('click', function (event) {
    if (!outsideMenuClickHandled &&!$(menu_search).is(event.target)) {
        $(menu_search).html('');
        $(menu_search).val('');
        $('#menu-search-result').html('');
        $('#menu-search-result').css('padding', '0px 0px');
        outsideMenuClickHandled = true;
    }
});