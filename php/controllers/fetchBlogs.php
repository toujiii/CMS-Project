<?php
require "../controllers/funtions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $offset = $_POST['offset'];

    $search = $_POST['search'] ?? '';


    $sql = "SELECT 
            blogs.blogID, 
            blogs.title, 
            blogs.publisher, 
            blogs.date_published, 
            COUNT(likes.blogID) as likes 
        FROM 
            blogs 
        LEFT JOIN 
            likes 
        ON 
            likes.blogID = blogs.blogID 
        WHERE 
            blogs.title LIKE '%$search%' OR 
            blogs.publisher LIKE '%$search%'
        GROUP BY 
            blogs.blogID 
        LIMIT $offset,5";

    $sql2 = "SELECT 
            blogs.blogID, 
            blogs.title, 
            blogs.publisher, 
            blogs.date_published, 
            COUNT(likes.blogID) as likes 
        FROM 
            blogs 
        LEFT JOIN 
            likes 
        ON 
            likes.blogID = blogs.blogID 
        WHERE 
            blogs.title LIKE '%$search%' OR 
            blogs.publisher LIKE '%$search%'
        GROUP BY 
            blogs.blogID";


    $query = mysqli_query($connection, $sql);
    $query2 = mysqli_query($connection, $sql2);

    $htmlResponse = '';
    $js_count = '';
    $count = mysqli_num_rows($query2);

    if (mysqli_num_rows($query) > 0) {
        while ($row = $query->fetch_assoc()) {
            $htmlResponse .= '<div class="record-container">';
            $htmlResponse .= '    <div class="record-counter">';
            $htmlResponse .= '        <span style="font-weight: bold; font-size: 16px;">#' . ++$offset . ' </span>';
            $htmlResponse .= '        <span style="color: #ffffff97;font-size: 12px;">(' . $row['blogID'] . ')</span>';
            $htmlResponse .= '    </div>';
            $htmlResponse .= '    <div class="record-details">';
            $htmlResponse .= '        <div class="top-record-details">';
            $htmlResponse .= '            <span class="record-title" onclick="window.location.href=\'blog-profile.php?id=' . $row['blogID'] . '\'">' . $row['title'] . '</span>';
            $htmlResponse .= '            <span class="record-title-tooltip">' . $row['title'] . '</span>';
            $htmlResponse .= '            <span class="record-likes bi-hand-thumbs-up-fill">' . $row['likes'] . '</span>';
            $htmlResponse .= '            <button class="record-edit-btn bi-pencil-fill"> Edit</button>';
            $htmlResponse .= '        </div>';
            $htmlResponse .= '        <div class="bottom-record-details">';
            $htmlResponse .= '            <span class="record-publisher">' . $row['publisher'] . '</span>';
            $htmlResponse .= '            <span class="record-date">Date Published: ' . $row['date_published'] . '</span>';
            $htmlResponse .= '            <button class="record-delete-btn bi-trash3-fill" onclick="openDeletePup(' . $row['blogID']  . ')"> Delete</button>';
            $htmlResponse .= '        </div>';
            $htmlResponse .= '    </div>';
            $htmlResponse .= '</div>';
        }
    } else {
        $htmlResponse = "<p>No records found.</p>";
    }

    $js_count = json_encode($count);

    echo json_encode(['html' => $htmlResponse, 'count' => $js_count]);
}
