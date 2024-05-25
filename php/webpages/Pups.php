<!-- Delete Pop up -->
<div class="pup-container" id="deletePup">
    <div class="pup-box" id="deletePupBox">
        <div class="pup-head">
            <span><strong>Are you sure you want to DELETE this?</strong></span>
            <span style="font-size: 13px;">You cannot retrieve this once deleted.</span>
        </div>
        <div class="pup-options">
            <button id="cancel" onclick="closeDeletePup()">Cancel</button>
            <button id="delete">Delete</button>
        </div>
    </div>
</div>

<!-- Continued Pop up from Delete-->
<div class="pup-container" id="continuedDeletePup">
    <div class="pup-box" id="continuedDeletePupBox">
        <div class="pup-head">
            <span class="bi-check-circle-fill" style="font-size:40px;"></span>
            <span><strong>Blog has been Deleted.</strong></span>
        </div>
        <div class="pup-options">
            <button id="continuedDelete">Continue</button>
        </div>
    </div>
</div>

<!-- Admin Sidebar Pop up -->
<div class="admin-sidebar" id="adminSidebar">
    <div class="sidebar-con" id="sideCon">
        <div class="logo-con">
            <img src="../../images/full-logo.png" alt="">
        </div>
        <a href="../webpages/admin-dashboard.php" class="bi-house">&nbsp;Home</a>
        <a href="../webpages/admin-create-blog.php" id="create-blog" class="bi-plus-square">&nbsp;&nbsp;Create a Blog</a>
        <a href="../controllers/logout.php" id="logout" class="bi-door-open-fill">&nbsp;Log out</a>
    </div>
    <div class="side-void" onclick="removeAdminSidebar()"></div>
</div>

<!-- Add Confirmation Pop up -->
<div class="pup-container" id="confirmPup">
    <div class="pup-box" id="confirmPupBox">
        <div class="pup-head">
            <span><strong>Are you sure you want to CREATE this Blog?</strong></span>
            <span style="font-size: 13px;">This blog will be added on the website.</span>
        </div>
        <div class="pup-options">
            <button id="cancel" onclick="closeConfirmPup()">Cancel</button>
            <button id="continue">Create</button>
        </div>
    </div>
</div>

<!-- Add Continued Pop up -->
<div class="pup-container" id="continuedPup">
    <div class="pup-box" id="continuedPupBox">
        <div class="pup-head">
            <span class="bi-check-circle-fill" style="font-size:40px;"></span>
            <span><strong>Blog has been Added.</strong></span>
        </div>
        <div class="pup-options">
            <button id="continued">Continue</button>
        </div>
    </div>
</div>


<!-- Edit Confirmation Pop up -->
<div class="pup-container" id="confirmEditPup">
    <div class="pup-box" id="confirmEditPupBox">
        <div class="pup-head">
            <span><strong>Are you sure you want to Edit this Blog?</strong></span>
            <span style="font-size: 13px;">This blog will be updated on the website.</span>
        </div>
        <div class="pup-options">
            <button id="cancel" onclick="closeConfirmEditPup()">Cancel</button>
            <button id="continueEdit">Edit</button>
        </div>
    </div>
</div>

<!-- Edit Continued Pop up -->
<div class="pup-container" id="continuedEditPup">
    <div class="pup-box" id="continuedEditPupBox">
        <div class="pup-head">
            <span class="bi-check-circle-fill" style="font-size:40px;"></span>
            <span><strong>Blog has been Updated.</strong></span>
        </div>
        <div class="pup-options">
            <button id="continuedEdit">Continue</button>
        </div>
    </div>
</div>



<!-- view Image Pop up -->
<div class="view-image-body" id="view-image">
    <div class="close-container ">
        <button class="bi-x-circle" onclick="closeImageView()"></button>
    </div>
    <div class="view-img-con" id="img-con">
        <img src="" alt="">
    </div>
    <div class="zoom-control">
        <button class="bi-zoom-in" onclick="zoomIn()"></button>
        <button class="bi-zoom-out" onclick="zoomOut()"></button>
    </div>
</div>