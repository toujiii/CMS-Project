let delete_pup = document.getElementById('deletePup');
let delete_pup_box = document.getElementById('deletePupBox');
let continue_delete_pup = document.getElementById('continuedDeletePup');
let continue_delete_pup_box = document.getElementById('continuedDeletePupBox');
let continued_delete = document.getElementById('continuedDelete');

let delete_btn = document.getElementById('delete');

var count = document.getElementById("count");
var counted = 0;
var page = document.getElementById("page");
counted = count.getAttribute("counted");

var offset = 0;
var searchText = '';

function openDeletePup(blogID) {
    delete_pup.style.visibility = "visible";
    delete_pup_box.style.scale = "100%";
    delete_pup.style.opacity = "1";
    console.log(blogID);


    delete_btn.addEventListener('click', function () {
        console.log('press');
        $.ajax({
            url: '../controllers/removeBLog.php',
            type: 'POST',
            data: {
                id: blogID,
            },
            success: function (response) {
                console.log(response);
                if (offset == counted - 1) {
                    offset = offset - 5;
                }
                fetchBlogs(offset, searchText);
                closeDeletePup();
                openContinueDeletePup();
            },
            error: function (status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    });
}

function openContinueDeletePup() {
    continue_delete_pup.style.visibility = "visible";
    continue_delete_pup_box.style.scale = "100%";
    continue_delete_pup.style.opacity = "1";
}


continued_delete.addEventListener('click', function () {
    continue_delete_pup_box.style.scale = "30%";
    continue_delete_pup.style.opacity = "0";
    setTimeout(function () {
        continue_delete_pup.style.visibility = "hidden";
    }, 200);
});


function closeDeletePup() {
    delete_pup_box.style.scale = "30%";
    delete_pup.style.opacity = "0";
    setTimeout(function () {
        delete_pup.style.visibility = "hidden";
    }, 200);
}

let adminSidebar = document.getElementById('adminSidebar');
let sideCon = document.getElementById('sideCon');

function openAdminSidebar() {
    adminSidebar.style.visibility = "visible";
    sideCon.style.marginLeft = "0";
    adminSidebar.style.opacity = "1";
}

function removeAdminSidebar() {
    sideCon.style.marginLeft = "-300px";

    setTimeout(function () {
        adminSidebar.style.visibility = "hidden";
        adminSidebar.style.opacity = "0";
    }, 200);
}





function fetchBlogs(newOffset, searchString) {
    console.log(searchString);
    if (newOffset == 0) {
        page.textContent = "Page " + 1;
    }
    else {
        page.textContent = "Page " + (parseInt(newOffset / 5) + 1);
    }
    $.ajax({
        url: '../controllers/fetchBlogs.php',
        type: 'POST',
        data: {
            offset: newOffset,
            search: searchString,
        },
        success: function (response) {
            var responseData = JSON.parse(response);

            $('#contents').html(responseData.html);

            console.log("Count: ", responseData.count);
            counted = responseData.count;
        },
        error: function (status, error) {
            console.error('AJAX Error:', status, error);
        }
    });
}

fetchBlogs(offset, searchText);


let next = document.getElementById('next');
next.addEventListener('click', function () {
    offset += 5;
    if (counted < offset + 5) {
        offset = 5 * (parseInt(counted / 5));
    }
    if (counted < offset) {
        offset = counted;
    }
    if (counted == offset) {
        offset = counted - 5;
    }
    console.log('offset:', offset);
    fetchBlogs(offset, searchText);
});

let previous = document.getElementById('previous');
previous.addEventListener('click', function () {
    offset -= 5;
    if (offset < 0) {
        offset = 0;
    }
    console.log('offset:', offset);
    fetchBlogs(offset, searchText);
});

let first = document.getElementById('first');
first.addEventListener('click', function () {
    offset = 0;
    console.log('offset:', offset);
    fetchBlogs(offset, searchText);
});
let last = document.getElementById('last');
last.addEventListener('click', function () {
    offset = 5 * (parseInt(counted / 5));
    if (counted == offset) {
        offset = counted - 5;
    }
    console.log('offset:', offset);
    fetchBlogs(offset, searchText);
});

let search = document.getElementById('search');
let search_icon = document.getElementById('search-icon');
let X_icon = document.getElementById('X-icon');


search.addEventListener('keyup', function () {

    search_icon.style.display = 'none';
    X_icon.style.display = 'flex';

    searchText = search.value;

    X_icon.addEventListener('click', function () {
        searchText = '';
        $(search).val('');

        search_icon.style.display = 'flex';
        X_icon.style.display = 'none';

        fetchBlogs(offset, searchText);
    });

    if (searchText.trim() !== '') {
        offset = 0;
        fetchBlogs(offset, searchText);
    }
    else {
        offset = 0;
        fetchBlogs(offset, searchText);
    }



});


function editBlog(blogID){
    $.ajax({
        method: 'POST',
        url: '../controllers/setSessionEdit.php',
        success: function(response) {
            console.log('Request was successful:', response);
            window.location.href = "../webpages/admin-edit-blog.php?id="+blogID;
        },
    });
}