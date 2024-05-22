<?php
require "../controllers/funtions.php";
$user_likes = selectRecords($connection, "*", "likes", 'deviceID', $_COOKIE['device_id']);

$blogID_likes = array();

while ($row = mysqli_fetch_assoc($user_likes)) {
    $blogID_likes[] = $row['blogID'];
}

echo json_encode($blogID_likes);
?>