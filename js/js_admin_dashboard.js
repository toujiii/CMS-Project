let delete_pup = document.getElementById('deletePup');
let delete_pup_box = document.getElementById('deletePupBox');

function openDeletePup() {
    delete_pup.style.visibility = "visible";
    delete_pup_box.style.scale = "100%";
    delete_pup.style.opacity = "1";
}

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
    sideCon.style.left = "0";
    adminSidebar.style.opacity = "1";
}

function removeAdminSidebar() {
    sideCon.style.left = "-50%";

    setTimeout(function () {
        adminSidebar.style.visibility = "hidden";
        adminSidebar.style.opacity = "0";
    }, 200);
}


$(document).ready(function () {
    var count = document.getElementById("count");
    var counted = 0;
    var page = document.getElementById("page");
    counted = count.getAttribute("counted");

    var offset = 0;
    var searchText = '';

    function fetchBlogs(newOffset, searchString) {
        console.log(searchString);
        if(newOffset == 0){
            page.textContent = "Page " + 1;
        }
        else{
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

                console.log("Count: ",responseData.count);
                counted = responseData.count;
            },
            error: function (status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    }

    fetchBlogs(offset,searchText);


    let next = document.getElementById('next');
    next.addEventListener('click', function () {
        offset += 5;
        if (counted < offset + 5) {
            offset = 5 * (parseInt(counted / 5));
        }
        if (counted < offset){
            offset = counted;
        }
        if (counted == offset){
            offset = 0;
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
        if (counted == offset){
            offset = 0;
        }
        console.log('offset:', offset);
        fetchBlogs(offset, searchText);
    });

    let search = document.getElementById('search');
    search.addEventListener('keyup', function () {
        searchText = search.value;
        if (searchText.trim() !== '') {
            offset = 0;
            fetchBlogs( offset ,searchText);
        }
        else {
            offset = 0;
            fetchBlogs(offset, searchText);
        }
    });
});