let content_section = document.getElementById('content-section');
let description = document.getElementById('description');
let expand = document.getElementById('expand');

function expandDescription() {
    console.log('expandDescription');
    content_section.style.height = "fit-content";
    content_section.style.overflow = "auto";
    expand.style.display = "none";
}

if (description.clientHeight > 150) {
    console.log('over');
} else {
    expand.style.display = "none";
    content_section.style.height = "fit-content";
}


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


function handleCheckboxClick(blogID) {
    var likebtn = document.getElementById('btn-like');
    var checkbox = document.getElementById('like-btn');
    if (!checkbox.checked) {
        console.log('Liked');
        likebtn.classList.remove('bi-hand-thumbs-up');
        likebtn.classList.add('bi-hand-thumbs-up-fill');
        addLike(blogID);
    } else {
        console.log('unliked');
        likebtn.classList.remove('bi-hand-thumbs-up-fill');
        likebtn.classList.add('bi-hand-thumbs-up');
        deleteLike(blogID);
    }
}

function addLike(blogID) {
    $.ajax({
        url: '../controllers/importLike.php',
        method: 'POST',
        data: { id: blogID },
        success: function (response) {
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
            console.log('Response from server:', response);
        },
        error: function (error) {
            console.error('Error:', error);
        }
    });
}