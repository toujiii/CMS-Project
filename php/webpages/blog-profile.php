<?php
session_start();
require "../controllers/funtions.php";
$id = $_GET["id"];


$blog_data = mysqli_fetch_assoc(selectRecords($connection, "*", "blogs", "blogID", $id));

$total_popularity = array();
$total_popularity[0] = $blog_data['popularity'] + 1;

updateRecords($connection, "blogs", "popularity", $total_popularity, $id);


$user_likes = selectRecords($connection, "*", "likes", 'deviceID', $_COOKIE['device_id']);

$like_status = false;

while ($row = mysqli_fetch_assoc($user_likes)) {
    if($id == $row['blogID']){
        $like_status = true;
        break;
    }
}

$likes = getTotalLikes($connection, $id);

// $_SESSION['Admin'] = true;
// unset($_SESSION['Admin']);

$_SESSION['Page'] = "blog-profile.php";
$_SESSION['blog_id'] = "?id=$id"
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
    <script defer src="../../js/jquery.min.js"></script>
    <script defer src="../../js/js_header.js"></script>
    <script defer src="../../js/js_blog_profile.js"></script>

    

    <title><?php echo $blog_data['title']; ?></title>
</head>

<body>
    <?php
    include "Pups.php";
    if (!isset($_SESSION['Admin'])) {
        include "header.php";
    }

    ?>

    <div class="profile-section1">
        <div class="blog-profile-title">
            <div class="navigation">
                <a href="index.php">Home</a>
                <p style="font-size: 15px;">&nbsp;>&nbsp;</p>
                <a class="nav-title" href="blog-profile.php?id=<?php echo $id; ?>"><?php echo $blog_data['title']; ?></a>
            </div>
            <p><?php echo $blog_data['title']; ?></p>
            <span class="bi-clock"> <?php echo $blog_data['date_published']; ?></span>
        </div>
        <div class="blog-profile-details">
            <p class="bi-person-fill"> <?php echo $blog_data['publisher']; ?></p>

            <label for="like-btn" id="btn-like" class="<?php if($like_status) { echo "bi-hand-thumbs-up-fill";} else {echo "bi-hand-thumbs-up";} ?>" onclick="handleCheckboxClick(<?php echo $id; ?>)"> <?php echo $likes; ?></label>
            <input id="like-btn" type="checkbox" <?php if($like_status) echo "checked"; ?>>
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
        <button class="expand" id="expand" onclick="expandDescription()">Read More</button>
    </div>
    <div class="profile-section3">
        <div class="profile-gap"></div>
        <div class="reco-title">
            <p>Recommended Blogs:</p>
        </div>
        <div class="reco-blogs">
            <a class="popular-blog-link" href="">Exploring the Intersection of Art and Technology: A Journey Through Creativity</a>
            <a class="popular-blog-link" href="">Exploring the Intersection of Art and Technology: A Journey Through Creativity</a>
            <a class="popular-blog-link" href="">Exploring the Intersection of Art and Technology: A Journey Through Creativity</a>
            <a class="popular-blog-link" href="">Exploring the Intersection of Art and Technology: A Journey Through Creativity</a>
            <a class="popular-blog-link" href="">Exploring the Intersection of Art and Technology: A Journey Through Creativity</a>
        </div>
    </div>
    <?php
    include "footer.php";

    ?>
</body>

</html>