let delete_pup = document.getElementById('deletePup');
let delete_pup_box = document.getElementById('deletePupBox');

function openDeletePup(){
    delete_pup.style.visibility = "visible";
    delete_pup_box.style.scale = "100%";
    delete_pup.style.opacity = "1";
}

function closeDeletePup(){
    
    delete_pup_box.style.scale = "30%";
    delete_pup.style.opacity = "0";
    setTimeout(function() {
        delete_pup.style.visibility = "hidden";
    }, 200);
}

let adminSidebar = document.getElementById('adminSidebar');
let sideCon = document.getElementById('sideCon');

function openAdminSidebar(){
    adminSidebar.style.visibility = "visible";
    sideCon.style.left = "0";
    adminSidebar.style.opacity = "1";
}

function removeAdminSidebar(){
    sideCon.style.left = "-50%";
    
    setTimeout(function() {
        adminSidebar.style.visibility = "hidden";
        adminSidebar.style.opacity = "0";
    }, 200);
}