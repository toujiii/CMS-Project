<?php
session_start();
require "../controllers/funtions.php";
$id = $_GET["id"];


$blog_data = mysqli_fetch_assoc(selectRecords($connection, "*", "blogs", "blogID", $id));

$total_popularity = array();
$total_popularity[0] = $blog_data['popularity'] + 1;

updateRecords($connection, "blogs", "popularity", $total_popularity, $id);


$user_likes = selectRecords($connection, "*", "likes", 'deviceID', $_COOKIE['device_id']);
$data = selectRecords($connection, "*", "blogs", '', '', 'RAND()', 5);


$like_status = false;

while ($row = mysqli_fetch_assoc($user_likes)) {
    if($id == $row['blogID']){
        $like_status = true;
        break;
    }
}

$likes = getTotalLikes($connection, $id);

$_SESSION['Page'] = "blog-profile.php";
$_SESSION['blog_id'] = "?id=$id";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/css_blog_profile.css">
    <link rel="stylesheet" href="../../css/css_header.css">
    <link rel="stylesheet" href="../../css/css_footer.css">
    <link rel="stylesheet" href="../../bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../css/css_Pups.css">
    <link rel="icon" href="../../images/icon.png">
    <script defer src="../../js/js_search.js"></script>
    <script defer src="../../js/js_header.js"></script>
    <script defer src="../../js/js_blog_profile.js"></script>
    <script src="../../js/jquery.min.js"></script>
    <title><?php echo $blog_data['title']; ?></title>
</head>

<body>
    <?php
    
    if (!isset($_SESSION['Admin'])) {
        include "header.php";
    }

    if (isset($_SESSION['Admin'])) {
    ?>
        <div class="admin-top">
            <a class="bi-house" href="admin-dashboard.php"> Home</a>
        </div>
    <?php }?>
    <div class="profile-section1" <?php if (isset($_SESSION['Admin'])) { echo "style='margin-top: 0;'";}?>>
        <div class="blog-profile-title">
            <?php if (!isset($_SESSION['Admin'])) {?>
            <div class="navigation">
                <a href="index.php">Home</a>
                <p style="font-size: 15px;">&nbsp;>&nbsp;</p>
                <a class="nav-title" href="blog-profile.php?id=<?php echo $id; ?>"><?php echo $blog_data['title']; ?></a>
            </div>
            <?php }?>
            <p><?php echo $blog_data['title']; ?></p>
            <span class="bi-clock"> <?php echo $blog_data['date_published']; ?></span>
        </div>
        <div class="blog-profile-details">
            <p class="bi-person-fill"> <?php echo $blog_data['publisher']; ?></p>
            <?php if (!isset($_SESSION['Admin'])) { ?>
                <label for="like-btn" id="btn-like" class="<?php if($like_status) { echo "bi-hand-thumbs-up-fill";} else {echo "bi-hand-thumbs-up";} ?>" onclick="handleCheckboxClick(<?php echo $id; ?>)"> <?php echo $likes; ?></label>
                <input id="like-btn" type="checkbox" <?php if($like_status) echo "checked"; ?>>
            <?php } else if (isset($_SESSION['Admin'])) { ?>
                <span class="bi-hand-thumbs-up" style="font-size: 20px;"> <?php echo $likes; ?></span>
            <?php }?>
        </div>
        <div class="profile-gap"></div>
    </div>
    <div class="profile-section2" id="content-section">
        <div class="profile-image-container">
            <img src="../../blog-images/blog-<?php echo $id; ?>/cover.png" alt="" onclick="openImageView('<?php echo $id; ?>')">
        </div>
        <div class="profile-contents" id="description">
            <p><?php echo $blog_data['content']; ?></p>
        </div>
        <button class="expand" <?php if (isset($_SESSION['Admin'])) { echo 'style="border-bottom: 4px solid #202020;"';}?>  id="expand" onclick="expandDescription()">Read More</button>
    </div>
    <?php if (!isset($_SESSION['Admin'])) {?>
        <div class="profile-section3">
            <div class="profile-gap"></div>
            <div class="reco-title">
                <p>Recommended Blogs:</p>
            </div>
            <div class="reco-blogs">
            
            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                <a class="popular-link" href="blog-profile.php?id=<?php echo  $row['blogID']; ?>"><?php echo $row['title']; ?></a>
            <?php }?>
            </div>
        </div>
    <?php }?>
    <?php
    include "footer.php";

    ?>
</body>

</html>