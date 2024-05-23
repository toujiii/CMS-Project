<?php
require "../controllers/funtions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fields = [
        "blogID" => $_POST['id'],
    ];

    deleteRecords($connection,'blogs',$fields);

    $dir = "../../blog-images/blog-" . $_POST['id'];
    deleteDirectory($dir);
}
else {
    echo "Error: No Value was Retrieved.";
}
?>