<?php
require "../controllers/funtions.php";

if (isset($_POST['name'])) {
    $search = $_POST['name'];

    $sql = "SELECT * FROM blogs WHERE title LIKE '%$search%' OR publisher LIKE '%$search%' LIMIT 5";
    $query = mysqli_query($connection, $sql);

    if (mysqli_num_rows($query) > 0) {
        while ($row = $query->fetch_assoc()) {
            echo '<a href="blog-profile.php?id=' . $row["blogID"] . '">' . $row["title"] . '<p>By: ' . $row["publisher"] . '</p>' . '</a>';
        }
    }
    else {
        echo '<p>No results found.</p>';
    }
}
?>