<?php
require "../controllers/funtions.php";

if(isset($_POST['id'])) {
    $conditions = [
        "blogID" => $_POST['id'],
        "deviceID" => $_COOKIE['device_id']
    ];

    deleteRecords($connection, 'likes', $conditions);
} else {
    echo "Error: Value not received from client.";
}
?>