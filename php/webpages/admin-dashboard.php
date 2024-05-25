<?php
session_start();
require "../controllers/funtions.php";
$_SESSION['page'] = 'admin-dashboard';

if (!isset($_SESSION['Admin'])) {
    header("Location:index.php");
}

$data = selectRecords($connection, "*", "blogs");
$count = mysqli_num_rows($data);

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
    <script defer src="../../js/js_set_session.js"></script>
    <script id="count" counted="<?php echo $count; ?>"></script>
    <script src="../../js/jquery.min.js"></script>
    <title>Admin Dashboard</title>
</head>

<body>
    <?php
    include "Pups.php";
    ?>
    <div class="main-container">
        <div class="admin-nav">
            <button onclick="openAdminSidebar();">&#9776;</button>
            <span><img src="../../images/logo.png" alt="">Welcome, Admin</span>
        </div>
        <div class="dashboard-contents">
            <div class="dashboard-nav">
                <span>Blog Records</span>
                <div class="search-con" action="">
                    <input class="dashboard-search" placeholder="Search a blog" type="text" id="search" autocomplete="off">
                    <button id="search-icon" class="dashboard-search-btn bi-search" type="submit"></button>
                    <button id="X-icon" class="dashboard-close-btn bi-x"></button>
                </div>
            </div>
            <div id="contents" class="dashboard-records"> </div>
        </div>
        <div class="pagination-container">
            <button class="out" id="first">First</button>
            <button class="in" id="previous">Previous</button>
            <p id="page"></p>
            <button class="in" id="next">Next</button>
            <button class="out" id="last">Last</button>
        </div>
    </div>

</body>

</html>