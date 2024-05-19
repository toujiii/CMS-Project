<?php
$id = "1001";
$title = "Exploring the Intersection of Art and Technology: A Journey Through Creativity";
$publisher = "Gareth Manzano";
$date = "2024-05-14  13:04:56";
$likes = "100";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/css_admin_dashboard.css">
    <link rel="stylesheet" href="../../bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../css/css_Pups.css">
    <link rel="icon" href="../../images/icon.png">
    <link rel="stylesheet" href="../webpages/Pups.php">
    <script defer src="../../js/js_admin_dashboard.js"></script>
    <title>Admin Dashboard</title>
</head>

<body>
    <?php 
        include "../webpages/Pups.php";
    ?>
    <div class="main-container">
        <div class="admin-nav">
            <button onclick="openAdminSidebar();">&#9776;</button>
            <span><img src="../../images/logo.png" alt="">Welcome, Admin</span>
        </div>
        <div class="dashboard-contents">
            <div class="dashboard-nav">
                <span>Blog Records</span>
                <form action="">
                    <input class="dashboard-search" placeholder="Search a blog" type="text">
                    <button class="dashboard-search-btn bi-search" type="submit"></button>
                </form>
            </div>
            <div class="dashboard-records">
                <div class="record-container">
                    <div class="record-counter">
                        <span style="font-weight: bold; font-size: 16px;">#1 </span>
                        <span style="color: #ffffff97;font-size: 12px;">(<?php echo $id;?>)</span>
                    </div>
                    <div class="record-details">
                        <div class="top-record-details">
                            <span class="record-title" onclick="window.location.href='blog-profile.php?id=<?php echo $id;?>'"><?php echo $title;?></span> <span class="record-title-tooltip"><?php echo $title;?></span>
                            <span class="record-likes bi-hand-thumbs-up-fill"><?php echo $likes;?></span>
                            <button class="record-edit-btn bi-pencil-fill"> Edit</button>
                        </div>
                        <div class="bottom-record-details">
                            <span class="record-publisher"><?php echo $publisher;?></span>
                            <span class="record-date">Date Published: <?php echo $date;?></span>
                            <button class="record-delete-btn bi-trash3-fill" onclick="openDeletePup()"> Delete</button>
                        </div>
                    </div>
                </div>
                <div class="record-container">
                    <div class="record-counter">
                        <span style="font-weight: bold; font-size: 20px;">#1 </span>
                        <span style="color: #ffffff97;font-size: 15px;">(<?php echo $id;?>)</span>
                    </div>
                    <div class="record-details">
                        <div class="top-record-details">
                            <span class="record-title"><?php echo $title;?></span> <span class="record-title-tooltip"><?php echo $title;?></span>
                            <span class="record-likes bi-hand-thumbs-up-fill"><?php echo $likes;?></span>
                            <button class="record-edit-btn bi-pencil-fill"> Edit</button>
                        </div>
                        <div class="bottom-record-details">
                            <span class="record-publisher"><?php echo $publisher;?></span>
                            <span class="record-date">Date Published: <?php echo $date;?></span>
                            <button class="record-delete-btn bi-trash3-fill"> Delete</button>
                        </div>
                    </div>
                </div>
                <div class="record-container">
                    <div class="record-counter">
                        <span style="font-weight: bold; font-size: 20px;">#1 </span>
                        <span style="color: #ffffff97;font-size: 15px;">(<?php echo $id;?>)</span>
                    </div>
                    <div class="record-details">
                        <div class="top-record-details">
                            <span class="record-title"><?php echo $title;?></span> <span class="record-title-tooltip"><?php echo $title;?></span>
                            <span class="record-likes bi-hand-thumbs-up-fill"><?php echo $likes;?></span>
                            <button class="record-edit-btn bi-pencil-fill"> Edit</button>
                        </div>
                        <div class="bottom-record-details">
                            <span class="record-publisher"><?php echo $publisher;?></span>
                            <span class="record-date">Date Published: <?php echo $date;?></span>
                            <button class="record-delete-btn bi-trash3-fill"> Delete</button>
                        </div>
                    </div>
                </div>
                <div class="record-container">
                    <div class="record-counter">
                        <span style="font-weight: bold; font-size: 20px;">#1 </span>
                        <span style="color: #ffffff97;font-size: 15px;">(<?php echo $id;?>)</span>
                    </div>
                    <div class="record-details">
                        <div class="top-record-details">
                            <span class="record-title"><?php echo $title;?></span> <span class="record-title-tooltip"><?php echo $title;?></span>
                            <span class="record-likes bi-hand-thumbs-up-fill"><?php echo $likes;?></span>
                            <button class="record-edit-btn bi-pencil-fill"> Edit</button>
                        </div>
                        <div class="bottom-record-details">
                            <span class="record-publisher"><?php echo $publisher;?></span>
                            <span class="record-date">Date Published: <?php echo $date;?></span>
                            <button class="record-delete-btn bi-trash3-fill"> Delete</button>
                        </div>
                    </div>
                </div>
                <div class="record-container">
                    <div class="record-counter">
                        <span style="font-weight: bold; font-size: 20px;">#1 </span>
                        <span style="color: #ffffff97;font-size: 15px;">(<?php echo $id;?>)</span>
                    </div>
                    <div class="record-details">
                        <div class="top-record-details">
                            <span class="record-title"><?php echo $title;?></span> <span class="record-title-tooltip"><?php echo $title;?></span>
                            <span class="record-likes bi-hand-thumbs-up-fill"><?php echo $likes;?></span>
                            <button class="record-edit-btn bi-pencil-fill"> Edit</button>
                        </div>
                        <div class="bottom-record-details">
                            <span class="record-publisher"><?php echo $publisher;?></span>
                            <span class="record-date">Date Published: <?php echo $date;?></span>
                            <button class="record-delete-btn bi-trash3-fill"> Delete</button>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
        <div class="pagination-container">
            <button id="out">First</button>
            <button id="in">Previous</button>
            <button id="in">Next</button>
            <button id="out">Last</button>
        </div>
    </div>

</body>

</html>