<?php
session_start();
$_SESSION['Page'] = "index.php";

require "../controllers/funtions.php";

if (isset($_GET['sort'])) {
    if ($_GET['sort'] == 'latest') {
        $sort = "date_published DESC";
    }
} else {
    $sort = "RAND()";
}
settingCookie();
$data = selectRecords($connection, "*", "blogs", '', '', $sort);
$popular_blogs = selectRecords($connection, "*", "blogs", '', '', 'popularity DESC', '10');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/css_visitor_homepage.css">
    <link rel="stylesheet" href="../../css/css_header.css">
    <link rel="stylesheet" href="../../css/css_footer.css">
    <link rel="stylesheet" href="../../css/css_Pups.css">
    <link rel="stylesheet" href="../../bootstrap-icons/font/bootstrap-icons.min.css">
    
    <script defer src="../../js/js_index.js"></script>
    <script defer src="../../js/js_header.js"></script>
    <script src="../../js/jquery.min.js"></script>
    <link rel="icon" href="../../images/icon.png">
    <title>Kuilt.</title>
    <style>
        .nav-bar {
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.2s ease;
        }
    </style>
</head>

<body>
    <?php
    include "Pups.php";
    include "header.php";
    ?>
    <a class="go-up" href="#for-you" id="goUpButton"><span class=" bi-arrow-up-short"></span></a>

    <div class="head-top-container">
        <div class="temp-header">
            <img src="../../images/full-logo.png" alt="">
            <a class="home bi-house" href="../webpages/index.php"> Home</a>
            <a class="authorize" href="../webpages/admin-login.php">Authorize</a>
            <button class="menu" onclick="openMenuBurger()">&#9776;</button>
        </div>
        <div class="bottom-wrap">
            <div class="motto">
                <p>Explore. Learn. Share.</p>
            </div>
            <div class="search-head">
                <div class="search-boxing">
                    <div class="search-input">
                        <input type="text" placeholder="Search for a blog"><span class="bi-search"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="for-you">
        <div class="page-container">
            <div class="head-wrap" id="for-you">
                <p class="blog-head-title">Blogs for you</p>
                <a href="?sort=latest" style="margin-left: auto; <?php if (isset($_GET['sort']) == 'latest') echo 'background-color: #3d3d3d;'; ?> " class="blog-sort">Latest</a>
                <a href="" style="margin-left: 5px;" class="blog-sort">Most Likes</a>
            </div>
            <div class="blogs-wrap">
                <?php while ($row = mysqli_fetch_assoc($data)) {
                    $blogID = $row['blogID'];
                    echo "<script>";
                    echo "window.addEventListener('load', function() {";
                    echo "    checkLikeBlog($blogID);";
                    echo "});";
                    echo "</script>";
                ?>
                    <div class="blog-con">
                        <div class="blog-info">
                            <div class="blog-title">
                                <p><?php echo $row['title']; ?></p>
                            </div>
                            <div class="blog-other-info">
                                <p style="font-size: 11px;">Date Published: <?php echo $row['date_published']; ?></p>
                            </div>
                            <div class="blog-other-info">
                                <p class="bi-person-fill"> <?php echo $row['publisher']; ?></p>
                                <p class="bi-hand-thumbs-up-fill"> </p>
                            </div>
                            <div class="blog-img-con">
                                <img src="../../blog-images/blog-<?php echo $row['blogID']; ?>/cover.png" alt="" onclick="openImageView('<?php echo $row['blogID']; ?>')">
                            </div>
                        </div>
                        <div class="blog-link">
                            <a href="blog-profile.php?id=<?php echo  $row['blogID']; ?>">
                                <p class="bi-book"> See More</p>
                            </a>
                            <label id="btn-like<?php echo $row['blogID']; ?>" for="like-btn-<?php echo $row['blogID']; ?>" class="like-btn bi-hand-thumbs-up" onclick="handleCheckboxClick(<?php echo $row['blogID']; ?>)">&nbsp;Like</label>
                            <input id="like-btn-<?php echo $row['blogID']; ?>" type="checkbox">
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="special">
            <div class="special-wrapper">
                <div class="popular-wrap">
                    <div class="popular-title">
                        <p>Popular Blogs</p>
                    </div>
                    <div class="popular-border"></div>
                    <div class="popular-contents">
                        <?php while ($row = mysqli_fetch_assoc($popular_blogs)) { ?>
                            <a class="popular-link" href="blog-profile.php?id=<?php echo  $row['blogID']; ?>"><?php echo $row['title']; ?></a>
                        <?php } ?>
                    </div>
                </div>
                <p style="padding: 0; margin: 0;">© 2024 Kuilt. Team. All rights reserved.</p>
            </div>

        </div>
    </div>
</body>

</html>