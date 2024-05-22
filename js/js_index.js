let sidebar = document.getElementsByClassName("special")[0];
let sidebar_content = document.getElementsByClassName("special-wrapper")[0];
let recommended_wrapper = document.getElementsByClassName("recommended-wrap")[0];
window.onscroll = () => {
    let scrollTop = window.scrollY; // current scroll position
    let viewportHeight = window.innerHeight; //viewport height
    let contentHeight = sidebar_content.getBoundingClientRect().height; // current content height
    let sidebarTop = sidebar.getBoundingClientRect().top + window.pageYOffset; //distance from top to sidebar

    if (scrollTop >= contentHeight - viewportHeight + sidebarTop) {
        sidebar_content.style.transform = `translateY(-${contentHeight - viewportHeight + sidebarTop}px)`;
        sidebar_content.style.position = "fixed";
        sidebar_content.style.marginTop = "65px";

    }
    else {
        sidebar_content.style.transform = "";
        sidebar_content.style.position = "";
        sidebar_content.style.marginTop = "";
    }

}

window.addEventListener('scroll', function () {
    var goUpButton = document.getElementById('goUpButton');
    if (window.scrollY > window.innerHeight) {
        goUpButton.style.visibility = 'visible'; // Show the element when scrolled more than 100vh
    } else {
        goUpButton.style.visibility = 'hidden'; // Hide the element otherwise
    }
});

window.addEventListener('scroll', function () {
    console.log("try");
    var navBar = document.getElementById('nav-bar');
    if (window.scrollY > 550) {
        navBar.style.visibility = 'visible'; // Show the element when scrolled more than 100vh
        navBar.style.opacity = '1';
    } else {
        navBar.style.visibility = 'hidden'; // Hide the element otherwise
        navBar.style.opacity = '0';
    }
});

let view_image = document.getElementById('view-image');
function openImageView(blogID) {
    const imgCon = document.getElementById('img-con');
    const imgSrc = `../../blog-images/blog-${blogID}/cover.png`;
    imgCon.querySelector('img').src = imgSrc;
    view_image.style.visibility = 'visible';
    document.body.style.overflow = 'hidden';
}

function closeImageView() {
    let img = document.getElementById('img-con').querySelector('img');
    img.style.maxHeight = "";
    img.style.minHeight = "";
    view_image.style.visibility = 'hidden';
    document.body.style.overflow = '';
}

function zoomIn() {
    console.log('zoom');
    let img = document.getElementById('img-con').querySelector('img');
    let currentZoom = parseFloat(img.style.minHeight) || 650;
    let newZoom = currentZoom + 150;
    if (newZoom > 3000) {
        newZoom = 3000;
    }
    console.log('zoomin=' + newZoom);
    img.style.minHeight = newZoom + "px";
    img.style.maxHeight = newZoom + "px";
}
function zoomOut() {
    let img = document.getElementById('img-con').querySelector('img');
    let currentHeight = parseFloat(img.style.minHeight) || 650;
    let newHeight = currentHeight - 150;
    if (newHeight < 650) {
        newHeight = 650;
    }
    img.style.minHeight = newHeight + "px";
    img.style.maxHeight = newHeight + "px";
}


function handleLikedBlogs(){
    $.ajax({
        url: '../controllers/fetchLikeBlogs.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log('Data received:', response);
            transferResponse(response);
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', xhr.status, xhr.statusText);
            console.error('Response Text:', xhr.responseText);
            console.error('Status:', status);
            console.error('Error:', error);
        }
    });
}


var blogIDLikes = [];
function transferResponse(data) {
    blogIDLikes = data.slice();
}

handleLikedBlogs();

function checkLikeBlog(blogID) {
    for (var i = 0; i < blogIDLikes.length; i++) {
        if (blogIDLikes[i] == blogID) {
            console.log("found: " + blogIDLikes[i]);
            var likebtn = document.getElementById('btn-like' + blogIDLikes[i]);
            var checkbox = document.getElementById('like-btn-' + blogIDLikes[i]);
            checkbox.checked = false;
            likebtn.classList.remove('bi-hand-thumbs-up');
            likebtn.classList.add('bi-hand-thumbs-up-fill');
            likebtn.innerHTML = '&nbsp;Liked';
        }
    }
}


function handleCheckboxClick(blogID) {
    console.log('Clicked on blogID ' + blogID);
    var likebtn = document.getElementById('btn-like' + blogID);
    var checkbox = document.getElementById('like-btn-' + blogID);
    for (var i = 0; i < blogIDLikes.length; i++) {
        if (blogIDLikes[i] == blogID) {
            checkbox.checked = true;
        } 
    }
    if (!checkbox.checked) {
        console.log('Checkbox with blogID ' + blogID + ' is checked');
        likebtn.classList.remove('bi-hand-thumbs-up');
        likebtn.classList.add('bi-hand-thumbs-up-fill');
        addLike(blogID);
        likebtn.innerHTML = '&nbsp;Liked';
    } else {
        console.log('Checkbox with blogID ' + blogID + ' is unchecked');
        likebtn.classList.remove('bi-hand-thumbs-up-fill');
        likebtn.classList.add('bi-hand-thumbs-up');
        deleteLike(blogID);
        likebtn.innerHTML = '&nbsp;Like';
    }

}




function addLike(blogID) {
    $.ajax({
        url: '../controllers/importLike.php',
        method: 'POST',
        data: { id: blogID },
        success: function (response) {
            handleLikedBlogs();
            console.log('Response from server:', response);
        },
        error: function (error) {
            console.error('Error:', error);
        }
    });
}

function deleteLike(blogID) {
    console.log("deleting...");
    $.ajax({
        url: '../controllers/removeLike.php',
        method: 'POST',
        data: { id: blogID },
        success: function (response) {
            handleLikedBlogs();
            console.log('Response from server:', response);
        },
        error: function (error) {
            console.error('Error:', error);
        }
    });
}